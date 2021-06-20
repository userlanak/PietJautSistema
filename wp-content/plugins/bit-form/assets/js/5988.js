(self.webpackChunk_bitforms=self.webpackChunk_bitforms||[]).push([[5988],{5988:function(e,t,a){"use strict";a.r(t),a.d(t,{default:function(){return f}});var n=a(2122),r=a(7294),i=a(5637),s=a(2249),l=a(9151),o=a(5257),c=a(8434),d=a(5893);function f(e){var t=e.formID,a=e.analyticsConf,f=e.setAnalyticsConf,m=e.step,u=e.setStep,h=e.isLoading,b=e.setisLoading,_=e.setSnackbar,p=e.redirectLocation,w=e.isInfo,v=(0,r.useState)(!1),g=v[0],y=v[1],k=(0,r.useState)({dataCenter:"",clientId:"",clientSecret:"",ownerEmail:""}),x=k[0],C=k[1],j=function(e){var t=(0,n.Z)({},a),r=(0,n.Z)({},x);r[e.target.name]="",t[e.target.name]=e.target.value,C(r),f(t)};return(0,d.jsxs)("div",{className:"btcd-stp-page",style:(0,n.Z)({},{width:1===m&&900},{height:1===m&&"100%"}),children:[(0,d.jsx)("div",{className:"mt-3",children:(0,d.jsx)("b",{children:(0,i.__)("Integration Name:","bitform")})}),(0,d.jsx)("input",{className:"btcd-paper-inp w-6 mt-1",onChange:j,name:"name",value:a.name,type:"text",placeholder:(0,i.__)("Integration Name...","bitform"),disabled:w}),(0,d.jsx)("div",{className:"mt-3",children:(0,d.jsx)("b",{children:(0,i.__)("Data Center:","bitform")})}),(0,d.jsxs)("select",{onChange:j,name:"dataCenter",value:a.dataCenter,className:"btcd-paper-inp w-9 mt-1",disabled:w,children:[(0,d.jsx)("option",{value:"",children:(0,i.__)("--Select a data center--","bitform")}),(0,d.jsx)("option",{value:"com",children:"zoho.com"}),(0,d.jsx)("option",{value:"eu",children:"zoho.eu"}),(0,d.jsx)("option",{value:"com.cn",children:"zoho.com.cn"}),(0,d.jsx)("option",{value:"in",children:"zoho.in"}),(0,d.jsx)("option",{value:"com.au",children:"zoho.com.au"})]}),(0,d.jsx)("div",{style:{color:"red"},children:x.dataCenter}),(0,d.jsx)("div",{className:"mt-3",children:(0,d.jsx)("b",{children:(0,i.__)("Homepage URL:","bitform")})}),(0,d.jsx)(l.Z,{value:""+window.location.origin,setSnackbar:_,className:"field-key-cpy w-6 ml-0",readOnly:w}),(0,d.jsx)("div",{className:"mt-3",children:(0,d.jsx)("b",{children:(0,i.__)("Authorized Redirect URIs:","bitform")})}),(0,d.jsx)(l.Z,{value:p||window.location.href+"/redirect",setSnackbar:_,className:"field-key-cpy w-6 ml-0",readOnly:w}),(0,d.jsxs)("small",{className:"d-blk mt-5",children:[(0,i.__)("To get Client ID and SECRET , Please Visit","bitform")," ",(0,d.jsx)("a",{className:"btcd-link",href:"https://api-console.zoho."+((null==a?void 0:a.dataCenter)||"com")+"/",target:"_blank",rel:"noreferrer",children:(0,i.__)("Zoho API Console","bitform")})]}),(0,d.jsx)("div",{className:"mt-3",children:(0,d.jsx)("b",{children:(0,i.__)("Client id:","bitform")})}),(0,d.jsx)("input",{className:"btcd-paper-inp w-6 mt-1",onChange:j,name:"clientId",value:a.clientId,type:"text",placeholder:(0,i.__)("Client id...","bitform"),disabled:w}),(0,d.jsx)("div",{style:{color:"red"},children:x.clientId}),(0,d.jsx)("div",{className:"mt-3",children:(0,d.jsx)("b",{children:(0,i.__)("Client secret:","bitform")})}),(0,d.jsx)("input",{className:"btcd-paper-inp w-6 mt-1",onChange:j,name:"clientSecret",value:a.clientSecret,type:"text",placeholder:(0,i.__)("Client secret...","bitform"),disabled:w}),(0,d.jsx)("div",{style:{color:"red"},children:x.clientSecret}),(0,d.jsx)("div",{className:"mt-3",children:(0,d.jsx)("b",{children:(0,i.__)("Zoho Analytics Owner Email:","bitform")})}),(0,d.jsx)("input",{className:"btcd-paper-inp w-6 mt-1",onChange:j,name:"ownerEmail",value:a.ownerEmail,type:"email",placeholder:(0,i.__)("Owner Email","bitform"),disabled:w}),(0,d.jsx)("div",{style:{color:"red"},children:x.ownerEmail}),!w&&(0,d.jsxs)(d.Fragment,{children:[(0,d.jsxs)("button",{onClick:function(){return(0,c.P_)(a,f,C,y,b,_)},className:"btn btcd-btn-lg green sh-sm flx",type:"button",disabled:g,children:[g?(0,i.__)("Authorized ✔","bitform"):(0,i.__)("Authorize","bitform"),h&&(0,d.jsx)(o.Z,{size:"20",clr:"#022217",className:"ml-2"})]}),(0,d.jsx)("br",{}),(0,d.jsxs)("button",{onClick:function(){(0,s.Iy)(a.ownerEmail)?(u(2),(0,c.GQ)(t,a,f,b,_),document.querySelector(".btcd-s-wrp").scrollTop=0):C({ownerEmail:(0,s.Iy)(a.ownerEmail)?"":(0,i.__)("Email is invalid","bitform")})},className:"btn f-right btcd-btn-lg green sh-sm flx",type:"button",disabled:!g,children:[(0,i.__)("Next","bitform"),(0,d.jsx)("div",{className:"btcd-icn icn-arrow_back rev-icn d-in-b"})]})]})]})}},8434:function(e,t,a){"use strict";a.d(t,{WK:function(){return l},P_:function(){return o},Rx:function(){return d},GQ:function(){return u},Tf:function(){return b},j0:function(){return _}});var n=a(2122),r=a(5637),i=a(9492),s=a(2249),l=function(){var e={},t=window.location.href.replace(window.opener.location.href+"/redirect","").split("&");t&&t.forEach((function(t){var a=t.split("=");a[1]&&(e[a[0]]=a[1])})),localStorage.setItem("__bitforms_zohoAnalytics",JSON.stringify(e)),window.close()},o=function(e,t,a,i,l,o){if(e.dataCenter&&e.clientId&&e.clientSecret)if((0,s.Iy)(e.ownerEmail)){l(!0);var d="https://accounts.zoho."+e.dataCenter+"/oauth/v2/auth?scope=ZohoAnalytics.metadata.read,ZohoAnalytics.data.read,ZohoAnalytics.data.create,ZohoAnalytics.data.update,ZohoAnalytics.usermanagement.read,ZohoAnalytics.share.create&response_type=code&client_id="+e.clientId+"&prompt=Consent&access_type=offline&redirect_uri="+encodeURIComponent(window.location.href)+"/redirect",f=window.open(d,"zohoAnalytics","width=400,height=609,toolbar=off"),m=setInterval((function(){if(f.closed){clearInterval(m);var a={},s=!1,d=localStorage.getItem("__bitforms_zohoAnalytics");if(d&&(s=!0,a=JSON.parse(d),localStorage.removeItem("__bitforms_zohoAnalytics")),a.code&&!a.error&&a&&s){var u=(0,n.Z)({},e);u.accountServer=a["accounts-server"],c(a,u,t,i,l,o)}else{var h=a.error?"Cause: "+a.error:"";o({show:!0,msg:(0,r.__)("Authorization failed","bitform")+" "+h+". "+(0,r.__)("please try again","bitform")}),l(!1)}}}),500)}else a({ownerEmail:(0,s.Iy)(e.ownerEmail)?"":(0,r.__)("Email is invalid","bitform")});else a({dataCenter:e.dataCenter?"":(0,r.__)("Data center cann't be empty","bitform"),clientId:e.clientId?"":(0,r.__)("Client ID cann't be empty","bitform"),clientSecret:e.clientSecret?"":(0,r.__)("Secret key cann't be empty","bitform")})},c=function(e,t,a,s,l,o){var c=(0,n.Z)({},e);c.dataCenter=t.dataCenter,c.clientId=t.clientId,c.clientSecret=t.clientSecret,c.redirectURI=encodeURIComponent(window.location.href)+"/redirect",(0,i.Z)(c,"bitforms_zanalytics_generate_token").then((function(e){return e})).then((function(e){if(e&&e.success){var i=(0,n.Z)({},t);i.tokenDetails=e.data,a(i),s(!0),o({show:!0,msg:(0,r.__)("Authorized Successfully","bitform")})}else e&&e.data&&e.data.data||!e.success&&"string"===typeof e.data?o({show:!0,msg:""+(0,r.__)("Authorization failed Cause:","bitform")+(e.data.data||e.data)+". "+(0,r.__)("please try again","bitform")}):o({show:!0,msg:(0,r.__)("Authorization failed. please try again","bitform")});l(!1)}))},d=function(e,t,a,r,i,s){var l=(0,n.Z)({},t),o=e.target,c=o.name,d=o.value;switch(l[c]=d,c){case"workspace":l=f(l,r,a,i,s);break;case"table":l=m(l,r,a,i,s)}a((0,n.Z)({},l))},f=function(e,t,a,r,i){var s,l,o,c,d=(0,n.Z)({},e);if(d.table="",d.field_map=[{formField:"",zohoFormField:""}],null!=d&&null!=(s=d.default)&&null!=(l=s.tables)&&l[e.workspace]){if(1===Object.keys(null==d||null==(o=d.default)||null==(c=o.tables)?void 0:c[e.workspace]).length){var f,m,u,p,w;d.table=null==d||null==(f=d.default)||null==(m=f.tables)?void 0:m[e.workspace][0].viewName,null!=d&&null!=(u=d.default)&&null!=(p=u.tables)&&null!=(w=p.headers)&&w[d.table]||_(t,d,a,r,i)}}else b(t,d,a,r,i);return e.default.users||h(t,e,a,r,i),d},m=function(e,t,a,r,i){var s,l,o,c=(0,n.Z)({},e);return c.field_map=[{formField:"",zohoFormField:""}],null!=c&&null!=(s=c.default)&&null!=(l=s.tables)&&null!=(o=l.headers)&&o[e.table]||_(t,c,a,r,i),c},u=function(e,t,a,s,l){s(!0);var o={formID:e,id:t.id,dataCenter:t.dataCenter,clientId:t.clientId,clientSecret:t.clientSecret,tokenDetails:t.tokenDetails,ownerEmail:t.ownerEmail};(0,i.Z)(o,"bitforms_zanalytics_refresh_workspaces").then((function(e){if(e&&e.success){var i=(0,n.Z)({},t);i.default||(i.default={}),e.data.workspaces&&(i.default.workspaces=e.data.workspaces),e.data.tokenDetails&&(i.tokenDetails=e.data.tokenDetails),l({show:!0,msg:(0,r.__)("Workspaces refreshed","bitform")}),a((0,n.Z)({},i))}else e&&e.data&&e.data.data||!e.success&&"string"===typeof e.data?l({show:!0,msg:""+(0,r.__)("Workspaces refresh failed Cause:","bitform")+(e.data.data||e.data)+". "+(0,r.__)("please try again","bitform")}):l({show:!0,msg:(0,r.__)("Workspaces refresh failed. please try again","bitform")});s(!1)})).catch((function(){return s(!1)}))},h=function(e,t,a,s,l){s(!0);var o={formID:e,id:t.id,dataCenter:t.dataCenter,clientId:t.clientId,clientSecret:t.clientSecret,tokenDetails:t.tokenDetails,ownerEmail:t.ownerEmail};(0,i.Z)(o,"bitforms_zanalytics_refresh_users").then((function(e){if(e&&e.success){var i=(0,n.Z)({},t);i.default||(i.default={}),e.data.users&&(i.default.users=e.data.users),e.data.tokenDetails&&(i.tokenDetails=e.data.tokenDetails),l({show:!0,msg:(0,r.__)("Users refreshed","bitform")}),a((0,n.Z)({},i))}else e&&e.data&&e.data.data||!e.success&&"string"===typeof e.data?l({show:!0,msg:""+(0,r.__)("Users refresh failed Cause:","bitform")+(e.data.data||e.data)+". "+(0,r.__)("please try again","bitform")}):l({show:!0,msg:(0,r.__)("Users refresh failed. please try again","bitform")});s(!1)})).catch((function(){return s(!1)}))},b=function(e,t,a,s,l){var o=t.workspace;if(o){s(!0);var c={formID:e,workspace:o,dataCenter:t.dataCenter,clientId:t.clientId,clientSecret:t.clientSecret,tokenDetails:t.tokenDetails,ownerEmail:t.ownerEmail};(0,i.Z)(c,"bitforms_zanalytics_refresh_tables").then((function(e){if(e&&e.success){var i=(0,n.Z)({},t);e.data.tables&&(i.default.tables||(i.default.tables={}),i.default.tables[o]=e.data.tables),e.data.tokenDetails&&(i.tokenDetails=e.data.tokenDetails),l({show:!0,msg:(0,r.__)("Tables refreshed","bitform")}),a((0,n.Z)({},i))}else l({show:!0,msg:(0,r.__)("Tables refresh failed. please try again","bitform")});s(!1)})).catch((function(){return s(!1)}))}},_=function(e,t,a,s,l){var o=t.workspace,c=t.table;if(c){s(!0);var d={formID:e,workspace:o,table:c,dataCenter:t.dataCenter,clientId:t.clientId,clientSecret:t.clientSecret,tokenDetails:t.tokenDetails,ownerEmail:t.ownerEmail};(0,i.Z)(d,"bitforms_zanalytics_refresh_table_headers").then((function(e){if(e&&e.success){var i=(0,n.Z)({},t);e.data.table_headers?(i.default.tables.headers||(i.default.tables.headers={}),i.default.tables.headers[c]=e.data.table_headers,l({show:!0,msg:(0,r.__)("Table Headers refreshed","bitform")})):l({show:!0,msg:(0,r.__)("Zoho didn't provide column names for this table","bitform")}),e.data.tokenDetails&&(i.tokenDetails=e.data.tokenDetails),a((0,n.Z)({},i))}else l({show:!0,msg:(0,r.__)("Table Headers refresh failed. please try again","bitform")});s(!1)})).catch((function(){return s(!1)}))}}}}]);