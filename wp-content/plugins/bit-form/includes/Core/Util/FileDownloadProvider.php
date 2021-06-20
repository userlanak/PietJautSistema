<?php
namespace BitCode\BitForm\Core\Util;

final class FileDownloadProvider
{
    public function register()
    {
        add_action('template_redirect', array($this,'authCheckandFrceDownloadHelper'));
        add_shortcode('bitforms-frontend-file', array($this,'handleFileDownload'));
    }

    public function handleFileDownload()
    {
        if (!isset($_GET['formID']) || !isset($_GET['entryID']) || !isset($_GET['fileID'])) {
            global $wp_query;
            $wp_query->set_404();
            status_header(404);
            get_template_part(404);
            exit();
        }
        $formID  = intval(sanitize_text_field($_GET['formID']));
        $entryID = intval(sanitize_text_field($_GET['entryID']));
        $fileID  = sanitize_file_name($_GET['fileID']);
        $filePath = BITFORMS_UPLOAD_DIR.DIRECTORY_SEPARATOR.$formID.DIRECTORY_SEPARATOR.$entryID.DIRECTORY_SEPARATOR.$fileID;
        if (is_readable($filePath)) {
            $this->fileDownloadORView($file, true);
        }
    }

    public static function getBaseDownloadURL()
    {
        $routes = get_option('bitforms_routes');
        if (isset($routes['file'])) {
            $file_page = get_page($routes['file']);
            if (empty($file_page)) {
                $file_route_id = wp_insert_post(
                    array(
                    'post_name'      => 'bitforms-file',
                    'comment_status' => 'closed',
                    'ping_status'    => 'closed',
                    'post_content'   => '<!-- wp:shortcode -->[bitforms-frontend-file /]<!-- /wp:shortcode -->',
                    'post_status'    => 'publish',
                    'post_type'      => 'bitforms'
                    )
                );
                $routes['file'] = $file_route_id;
                update_option('bitforms_routes', $routes);
                $file_page_slug = get_post_permalink($file_route_id);
            } else {
                $file_page_slug = get_post_permalink($file_page->ID);
            }
        } else {
            $file_route_id = wp_insert_post(
                array(
                'post_name'      => 'bitforms-file',
                'comment_status' => 'closed',
                'ping_status'    => 'closed',
                'post_content'   => '<!-- wp:shortcode -->[bitforms-frontend-file /]<!-- /wp:shortcode -->',
                'post_status'    => 'publish',
                'post_type'      => 'bitforms'
                )
            );
            $route_value = array();
            $route_value['file'] = $file_route_id;
            update_option('bitforms_routes', $route_value);
            $file_page_slug = get_post_permalink($file_route_id);
        }

        return $file_page_slug;
    }

    public function authCheckandFrceDownloadHelper()
    {
        if (!is_singular('bitforms')) {
            return;
        }
        global $post;
        if (!empty($post->post_content)) {
            $shortCodeRegex = get_shortcode_regex();
            preg_match_all('/'.$shortCodeRegex.'/', $post->post_content, $regexMatchGroups);
            if (!empty($regexMatchGroups[2]) && in_array('bitforms-frontend-file', $regexMatchGroups[2]) && is_user_logged_in()) {
                $file = $this->isRequestedFileExists();
                if ($file) {
                    $this->fileDownloadORView($file, isset($_GET['download']));
                } else {
                    $this->show404();
                }
            } else {
                auth_redirect();
            }
        }
    }

    private function show404()
    {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        get_template_part(404);
        exit();
    }
    private function isRequestedFileExists()
    {
        if (!isset($_GET['formID']) || !isset($_GET['entryID']) || !isset($_GET['fileID'])) {
            return false;
        }
        $formID  = intval(sanitize_text_field($_GET['formID']));
        $entryID = intval(sanitize_text_field($_GET['entryID']));
        $fileID  = sanitize_file_name($_GET['fileID']);
        $filePath = BITFORMS_UPLOAD_DIR.DIRECTORY_SEPARATOR.$formID.DIRECTORY_SEPARATOR.$entryID.DIRECTORY_SEPARATOR.$fileID;
        if (is_readable($filePath)) {
            return $filePath;
        }

        return false;
    }

    private function fileDownloadORView($filePath, $forceDownload = false)
    {
        if ($forceDownload) {
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
        } else {
            $ext = pathinfo($filePath, PATHINFO_EXTENSION);
            if ($ext=='pdf') {
                $content_types='application/pdf';
            } elseif ($ext=='doc') {
                $content_types='application/msword';
            } elseif ($ext=='docx') {
                $content_types='application/vnd.openxmlformats-officedocument.wordprocessingml.document';
            } elseif ($ext=='xls') {
                $content_types='application/vnd.ms-excel';
            } elseif ($ext=='xlsx') {
                $content_types='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
            } elseif ($ext=='txt' || $ext=='php' || $ext=='html' || $ext=='xhtml' || $ext=='json') {
                $content_types='text/plain';
            } elseif ($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='gif' || $ext=='tiff' || $ext=='svg' || $ext=='icon' || $ext=='ico') {
                $content_types="image/$ext";
            } elseif ($ext=='mpeg' || $ext=='mp3' || $ext=='wav') {
                $content_types="audio/$ext";
            } elseif ($ext=='mp4' || $ext=='webm' || $ext=='ogg') {
                $content_types="video/$ext";
            } else {
                $content_types='application/download';
            }
            header('Content-Disposition:filename="'.basename($filePath).'"');
            header("Content-Type: $content_types");
        }
        header('Content-Description: File Transfer');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        header("Content-Transfer-Encoding: binary ");
        flush();
        readfile($filePath);
        die();
    }
}
