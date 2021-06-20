(self.webpackChunk_bitforms=self.webpackChunk_bitforms||[]).push([[7109],{7109:function(e,t,a){"use strict";a.r(t),a.d(t,{default:function(){return d}});var r=a(2122),o=a(7294),n=a(5637),s=a(9151),i=a(5257),l=a(4917),c=a(5893);function d(e){var t=e.formID,a=e.sheetConf,d=e.setSheetConf,h=e.step,f=e.setstep,u=e.isLoading,m=e.setisLoading,b=e.setSnackbar,k=e.redirectLocation,_=e.isInfo,w=(0,o.useState)(!1),p=w[0],g=w[1],v=(0,o.useState)({dataCenter:"",clientId:"",clientSecret:""}),x=v[0],C=v[1],j=function(e){var t=(0,r.Z)({},a),o=(0,r.Z)({},x);o[e.target.name]="",t[e.target.name]=e.target.value,C(o),d(t)};return(0,c.jsxs)("div",{className:"btcd-stp-page",style:(0,r.Z)({},{width:1===h&&900},{height:1===h&&"100%"}),children:[(0,c.jsx)("div",{className:"mt-3",children:(0,c.jsx)("b",{children:(0,n.__)("Integration Name:","bitform")})}),(0,c.jsx)("input",{className:"btcd-paper-inp w-6 mt-1",onChange:j,name:"name",value:a.name,type:"text",placeholder:(0,n.__)("Integration Name...","bitform"),disabled:_}),(0,c.jsx)("div",{className:"mt-3",children:(0,c.jsx)("b",{children:(0,n.__)("Data Center:","bitform")})}),(0,c.jsxs)("select",{onChange:j,name:"dataCenter",value:a.dataCenter,className:"btcd-paper-inp w-9 mt-1",disabled:_,children:[(0,c.jsx)("option",{value:"",children:(0,n.__)("--Select a data center--","bitform")}),(0,c.jsx)("option",{value:"com",children:"zoho.com"}),(0,c.jsx)("option",{value:"eu",children:"zoho.eu"}),(0,c.jsx)("option",{value:"com.cn",children:"zoho.com.cn"}),(0,c.jsx)("option",{value:"in",children:"zoho.in"}),(0,c.jsx)("option",{value:"com.au",children:"zoho.com.au"})]}),(0,c.jsx)("div",{style:{color:"red"},children:x.dataCenter}),(0,c.jsx)("div",{className:"mt-3",children:(0,c.jsx)("b",{children:(0,n.__)("Homepage URL:","bitform")})}),(0,c.jsx)(s.Z,{value:""+window.location.origin,setSnackbar:b,className:"field-key-cpy w-6 ml-0",readOnly:_}),(0,c.jsx)("div",{className:"mt-3",children:(0,c.jsx)("b",{children:(0,n.__)("Authorized Redirect URIs:","bitform")})}),(0,c.jsx)(s.Z,{value:k||window.location.href+"/redirect",setSnackbar:b,className:"field-key-cpy w-6 ml-0",readOnly:_}),(0,c.jsxs)("small",{className:"d-blk mt-5",children:[(0,n.__)("To get Client ID and SECRET , Please Visit","bitform")," ",(0,c.jsx)("a",{className:"btcd-link",href:"https://api-console.zoho."+((null==a?void 0:a.dataCenter)||"com")+"/",target:"_blank",rel:"noreferrer",children:(0,n.__)("Zoho API Console","bitform")})]}),(0,c.jsx)("div",{className:"mt-3",children:(0,c.jsx)("b",{children:(0,n.__)("Client id:","bitform")})}),(0,c.jsx)("input",{className:"btcd-paper-inp w-6 mt-1",onChange:j,name:"clientId",value:a.clientId,type:"text",placeholder:(0,n.__)("Client id...","bitform"),disabled:_}),(0,c.jsx)("div",{style:{color:"red"},children:x.clientId}),(0,c.jsx)("div",{className:"mt-3",children:(0,c.jsx)("b",{children:(0,n.__)("Client secret:","bitform")})}),(0,c.jsx)("input",{className:"btcd-paper-inp w-6 mt-1",onChange:j,name:"clientSecret",value:a.clientSecret,type:"text",placeholder:(0,n.__)("Client secret...","bitform"),disabled:_}),(0,c.jsx)("div",{style:{color:"red"},children:x.clientSecret}),!_&&(0,c.jsxs)(c.Fragment,{children:[(0,c.jsxs)("button",{onClick:function(){return(0,l.P_)(a,d,C,g,m,b)},className:"btn btcd-btn-lg green sh-sm flx",type:"button",disabled:p,children:[p?(0,n.__)("Authorized ✔","bitform"):(0,n.__)("Authorize","bitform"),u&&(0,c.jsx)(i.Z,{size:"20",clr:"#022217",className:"ml-2"})]}),(0,c.jsx)("br",{}),(0,c.jsxs)("button",{onClick:function(){f(2),(0,l.h4)(t,a,d,m,b),document.querySelector(".btcd-s-wrp").scrollTop=0},className:"btn f-right btcd-btn-lg green sh-sm flx",type:"button",disabled:!p,children:[(0,n.__)("Next","bitform"),(0,c.jsx)("div",{className:"btcd-icn icn-arrow_back rev-icn d-in-b"})]})]})]})}},4917:function(e,t,a){"use strict";a.d(t,{Rx:function(){return s},h4:function(){return c},Co:function(){return d},kS:function(){return h},P_:function(){return f}});var r=a(2122),o=a(5637),n=a(9492),s=function(e,t,a,o,n,s,c,d,h){var f=(0,r.Z)({},t);if(c){var u=(0,r.Z)({},d);u[e.target.name]="",h((0,r.Z)({},u))}switch(f[e.target.name]=e.target.value,e.target.name){case"workbook":f=i(f,o,a,n,s);break;case"worksheet":f=l(f,o,a,n,s)}a((0,r.Z)({},f))},i=function(e,t,a,o,n){var s,i,l,c,f=(0,r.Z)({},e);if(f.worksheet="",f.field_map=[{formField:"",zohoFormField:""}],null!=f&&null!=(s=f.default)&&null!=(i=s.worksheets)&&i[e.workbook]){if(1===Object.keys(null==f||null==(l=f.default)||null==(c=l.worksheets)?void 0:c[e.workbook]).length){var u,m,b,k,_;f.worksheet=null==f||null==(u=f.default)||null==(m=u.worksheets)?void 0:m[e.workbook][0].viewName,null!=f&&null!=(b=f.default)&&null!=(k=b.worksheets)&&null!=(_=k.headers)&&_[f.worksheet]||h(t,f,a,o,n)}}else d(t,f,a,o,n);return f},l=function(e,t,a,o,n){var s,i,l,c=(0,r.Z)({},e);return c.field_map=[{formField:"",zohoFormField:""}],null!=c&&null!=(s=c.default)&&null!=(i=s.worksheets)&&null!=(l=i.headers)&&l[e.worksheet]||h(t,c,a,o,n),c},c=function(e,t,a,s,i){s(!0);var l={formID:e,id:t.id,dataCenter:t.dataCenter,clientId:t.clientId,clientSecret:t.clientSecret,tokenDetails:t.tokenDetails,ownerEmail:t.ownerEmail};(0,n.Z)(l,"bitforms_zsheet_refresh_workbooks").then((function(e){if(e&&e.success){var n=(0,r.Z)({},t);n.default||(n.default={}),e.data.workbooks&&(n.default.workbooks=e.data.workbooks),e.data.tokenDetails&&(n.tokenDetails=e.data.tokenDetails),i({show:!0,msg:(0,o.__)("Workbooks refreshed","bitform")}),a((0,r.Z)({},n))}else e&&e.data&&e.data.data||!e.success&&"string"===typeof e.data?i({show:!0,msg:(0,o.g)((0,o.__)("Workbooks refresh failed Cause: %s. please try again","bitform"),e.data.data||e.data)}):i({show:!0,msg:(0,o.__)("Workbooks refresh failed. please try again","bitform")});s(!1)})).catch((function(){return s(!1)}))},d=function(e,t,a,s,i){var l=t.workbook;if(l){s(!0);var c={formID:e,workbook:l,dataCenter:t.dataCenter,clientId:t.clientId,clientSecret:t.clientSecret,tokenDetails:t.tokenDetails};(0,n.Z)(c,"bitforms_zsheet_refresh_worksheets").then((function(e){if(e&&e.success){var n=(0,r.Z)({},t);e.data.worksheets&&(n.default.worksheets||(n.default.worksheets={}),n.default.worksheets[l]=e.data.worksheets),e.data.tokenDetails&&(n.tokenDetails=e.data.tokenDetails),i({show:!0,msg:(0,o.__)("Worksheets refreshed","bitform")}),a((0,r.Z)({},n))}else i({show:!0,msg:(0,o.__)("Worksheets refresh failed. please try again","bitform")});s(!1)})).catch((function(){return s(!1)}))}},h=function(e,t,a,s,i){var l=t.workbook,c=t.worksheet,d=t.headerRow;if(c){s(!0);var h={formID:e,workbook:l,worksheet:c,headerRow:d,dataCenter:t.dataCenter,clientId:t.clientId,clientSecret:t.clientSecret,tokenDetails:t.tokenDetails,ownerEmail:t.ownerEmail};(0,n.Z)(h,"bitforms_zsheet_refresh_worksheet_headers").then((function(e){if(e&&e.success){var n=(0,r.Z)({},t);e.data.worksheet_headers.length>0?(n.default.worksheets.headers||(n.default.worksheets.headers={}),n.default.worksheets.headers[c]||(n.default.worksheets.headers[c]={}),n.default.worksheets.headers[c][d]=e.data.worksheet_headers,e.data.tokenDetails&&(n.tokenDetails=e.data.tokenDetails),i({show:!0,msg:(0,o.__)("Worksheet Headers refreshed","bitform")})):i({show:!0,msg:(0,o.__)("No Worksheet headers found. Try changing the header row number or try again","bitform")}),e.data.tokenDetails&&(n.tokenDetails=e.data.tokenDetails),a((0,r.Z)({},n))}else i({show:!0,msg:(0,o.__)("Worksheet Headers refresh failed. please try again","bitform")});s(!1)})).catch((function(){return s(!1)}))}},f=function(e,t,a,n,s,i){if(e.dataCenter&&e.clientId&&e.clientSecret){s(!0);var l="https://accounts.zoho."+e.dataCenter+"/oauth/v2/auth?scope=ZohoSheet.dataAPI.READ,ZohoSheet.dataAPI.UPDATE&response_type=code&client_id="+e.clientId+"&prompt=Consent&access_type=offline&redirect_uri="+encodeURIComponent(window.location.href)+"/redirect",c=window.open(l,"zohoSheet","width=400,height=609,toolbar=off"),d=setInterval((function(){if(c.closed){clearInterval(d);var a={},l=!1,h=localStorage.getItem("__bitforms_zohoSheet");if(h&&(l=!0,a=JSON.parse(h),localStorage.removeItem("__bitforms_zohoSheet")),a.code&&!a.error&&a&&l){var f=(0,r.Z)({},e);f.accountServer=a["accounts-server"],u(a,f,t,n,s,i)}else{var m=a.error?"Cause: "+a.error:"";i({show:!0,msg:(0,o.__)("Authorization failed","bitform")+" "+m+". "+(0,o.__)("please try again","bitform")}),s(!1)}}}),500)}else a({dataCenter:e.dataCenter?"":(0,o.__)("Data center cann't be empty","bitform"),clientId:e.clientId?"":(0,o.__)("Client ID cann't be empty","bitform"),clientSecret:e.clientSecret?"":(0,o.__)("Secret key cann't be empty","bitform")})},u=function(e,t,a,s,i,l){var c=(0,r.Z)({},e);c.dataCenter=t.dataCenter,c.clientId=t.clientId,c.clientSecret=t.clientSecret,c.redirectURI=encodeURIComponent(window.location.href)+"/redirect",(0,n.Z)(c,"bitforms_zsheet_generate_token").then((function(e){return e})).then((function(e){if(e&&e.success){var n=(0,r.Z)({},t);n.tokenDetails=e.data,a(n),s(!0),l({show:!0,msg:(0,o.__)("Authorized Successfully","bitform")})}else e&&e.data&&e.data.data||!e.success&&"string"===typeof e.data?l({show:!0,msg:""+(0,o.__)("Authorization failed Cause:","bitform")+(e.data.data||e.data)+". "+(0,o.__)("please try again","bitform")}):l({show:!0,msg:(0,o.__)("Authorization failed. please try again","bitform")});i(!1)}))}}}]);