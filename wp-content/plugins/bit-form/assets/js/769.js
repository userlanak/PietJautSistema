(self.webpackChunk_bitforms=self.webpackChunk_bitforms||[]).push([[769],{769:function(e,t,a){"use strict";a.r(t),a.d(t,{default:function(){return d}});var n=a(2122),i=a(7294),r=a(5637),o=a(9151),s=a(5257),l=a(1212),c=a(5893);function d(e){var t=e.formID,a=e.marketingHubConf,d=e.setMarketingHubConf,f=e.step,m=e.setstep,u=e.isLoading,h=e.setisLoading,b=e.setSnackbar,_=e.redirectLocation,p=e.isInfo,g=(0,i.useState)(!1),v=g[0],x=g[1],C=(0,i.useState)({dataCenter:"",clientId:"",clientSecret:""}),k=C[0],w=C[1],j=function(e){var t=(0,n.Z)({},a),i=(0,n.Z)({},k);i[e.target.name]="",t[e.target.name]=e.target.value,w(i),d(t)};return(0,c.jsxs)("div",{className:"btcd-stp-page",style:(0,n.Z)({},{width:1===f&&900},{height:1===f&&"100%"}),children:[(0,c.jsx)("div",{className:"mt-3",children:(0,c.jsx)("b",{children:(0,r.__)("Integration Name:","bitform")})}),(0,c.jsx)("input",{className:"btcd-paper-inp w-6 mt-1",onChange:j,name:"name",value:a.name,type:"text",placeholder:(0,r.__)("Integration Name...","bitform"),disabled:p}),(0,c.jsx)("div",{className:"mt-3",children:(0,c.jsx)("b",{children:(0,r.__)("Data Center:","bitform")})}),(0,c.jsxs)("select",{onChange:j,name:"dataCenter",value:a.dataCenter,className:"btcd-paper-inp w-9 mt-1",disabled:p,children:[(0,c.jsx)("option",{value:"",children:(0,r.__)("--Select a data center--","bitform")}),(0,c.jsx)("option",{value:"com",children:"zoho.com"}),(0,c.jsx)("option",{value:"eu",children:"zoho.eu"}),(0,c.jsx)("option",{value:"com.cn",children:"zoho.com.cn"}),(0,c.jsx)("option",{value:"in",children:"zoho.in"}),(0,c.jsx)("option",{value:"com.au",children:"zoho.com.au"})]}),(0,c.jsx)("div",{style:{color:"red"},children:k.dataCenter}),(0,c.jsx)("div",{className:"mt-3",children:(0,c.jsx)("b",{children:(0,r.__)("Homepage URL:","bitform")})}),(0,c.jsx)(o.Z,{value:""+window.location.origin,setSnackbar:b,className:"field-key-cpy w-6 ml-0",readOnly:p}),(0,c.jsx)("div",{className:"mt-3",children:(0,c.jsx)("b",{children:(0,r.__)("Authorized Redirect URIs:","bitform")})}),(0,c.jsx)(o.Z,{value:_||window.location.href+"/redirect",setSnackbar:b,className:"field-key-cpy w-6 ml-0",readOnly:p}),(0,c.jsxs)("small",{className:"d-blk mt-5",children:[(0,r.__)("To get Client ID and SECRET , Please Visit","bitform")," ",(0,c.jsx)("a",{className:"btcd-link",href:"https://api-console.zoho."+((null==a?void 0:a.dataCenter)||"com")+"/",target:"_blank",rel:"noreferrer",children:(0,r.__)("Zoho API Console","bitform")})]}),(0,c.jsx)("div",{className:"mt-3",children:(0,c.jsx)("b",{children:(0,r.__)("Client id:","bitform")})}),(0,c.jsx)("input",{className:"btcd-paper-inp w-6 mt-1",onChange:j,name:"clientId",value:a.clientId,type:"text",placeholder:(0,r.__)("Client id...","bitform"),disabled:p}),(0,c.jsx)("div",{style:{color:"red"},children:k.clientId}),(0,c.jsx)("div",{className:"mt-3",children:(0,c.jsx)("b",{children:(0,r.__)("Client secret:","bitform")})}),(0,c.jsx)("input",{className:"btcd-paper-inp w-6 mt-1",onChange:j,name:"clientSecret",value:a.clientSecret,type:"text",placeholder:(0,r.__)("Client secret...","bitform"),disabled:p}),(0,c.jsx)("div",{style:{color:"red"},children:k.clientSecret}),!p&&(0,c.jsxs)(c.Fragment,{children:[(0,c.jsxs)("button",{onClick:function(){return(0,l.P_)(a,d,w,x,h,b)},className:"btn btcd-btn-lg green sh-sm flx",type:"button",disabled:v,children:[v?(0,r.__)("Authorized ✔","bitform"):(0,r.__)("Authorize","bitform"),u&&(0,c.jsx)(s.Z,{size:"20",clr:"#022217",className:"ml-2"})]}),(0,c.jsx)("br",{}),(0,c.jsxs)("button",{onClick:function(){m(2),(0,l.aS)(t,a,d,h,b),document.querySelector(".btcd-s-wrp").scrollTop=0},className:"btn f-right btcd-btn-lg green sh-sm flx",type:"button",disabled:!v,children:[(0,r.__)("Next","bitform"),(0,c.jsx)("div",{className:"btcd-icn icn-arrow_back rev-icn d-in-b"})]})]})]})}},1212:function(e,t,a){"use strict";a.d(t,{Rx:function(){return o},aS:function(){return l},Pg:function(){return c},Pd:function(){return d},P_:function(){return f},WK:function(){return u}});var n=a(2122),i=a(5637),r=a(9492),o=function(e,t,a,i,r,o,l,c,d){var f=(0,n.Z)({},a);if(l){var m=(0,n.Z)({},c);m[e.target.name]="",d((0,n.Z)({},m))}switch(f[e.target.name]=e.target.value,e.target.name){case"list":f=s(f,t,i,r,o)}i((0,n.Z)({},f))},s=function(e,t,a,i,r){var o,s,l=(0,n.Z)({},e);return l.field_map=[{formField:"",zohoFormField:"Contact Email"}],null!=l&&null!=(o=l.default)&&null!=(s=o.fields)&&s[l.list]||c(t,l,a,i,r),l},l=function(e,t,a,o,s){o(!0);var l={formID:e,id:t.id,dataCenter:t.dataCenter,clientId:t.clientId,clientSecret:t.clientSecret,tokenDetails:t.tokenDetails};(0,r.Z)(l,"bitforms_zmarketingHub_refresh_lists").then((function(e){if(e&&e.success){var r=(0,n.Z)({},t);e.data.lists&&(r.default=(0,n.Z)({},r.default,{lists:e.data.lists})),e.data.tokenDetails&&(r.tokenDetails=e.data.tokenDetails),s({show:!0,msg:(0,i.__)("Lists refreshed","bitform")}),a((0,n.Z)({},r))}else e&&e.data&&e.data.data||!e.success&&"string"===typeof e.data?s({show:!0,msg:""+(0,i.__)("Lists refresh failed Cause:")+(e.data.data||e.data)+". "+(0,i.__)("please try again","bitform")}):s({show:!0,msg:(0,i.__)("Lists refresh failed. please try again","bitform")});o(!1)})).catch((function(){return o(!1)}))},c=function(e,t,a,o,s){var l=t.list;if(l){o(!0);var c={formID:e,list:l,dataCenter:t.dataCenter,clientId:t.clientId,clientSecret:t.clientSecret,tokenDetails:t.tokenDetails};(0,r.Z)(c,"bitforms_zmarketingHub_refresh_contact_fields").then((function(e){if(e&&e.success){var r=(0,n.Z)({},t);e.data.fields?(r.default.fields||(r.default.fields={}),r.default.fields[l]=e.data,s({show:!0,msg:(0,i.__)("Contact Fields refreshed","bitform")})):s({show:!0,msg:(0,i.__)("Zoho didn't provide fields names for this list","bitform")}),e.data.tokenDetails&&(r.tokenDetails=e.data.tokenDetails),a((0,n.Z)({},r))}else s({show:!0,msg:(0,i.__)("Contact Fields refresh failed. please try again","bitform")});o(!1)})).catch((function(){return o(!1)}))}},d=function(e){return!((null!=e&&e.field_map?e.field_map.filter((function(t){var a,n,i;return!t.formField&&t.zohoFormField&&-1!==(null==e||null==(a=e.default)||null==(n=a.fields)||null==(i=n[e.list])?void 0:i.required.indexOf(t.zohoFormField))})):[]).length>0)},f=function(e,t,a,r,o,s){if(e.dataCenter&&e.clientId&&e.clientSecret){o(!0);var l="https://accounts.zoho."+e.dataCenter+"/oauth/v2/auth?scope=ZohoMarketingHub.lead.READ,ZohoMarketingHub.lead.CREATE,ZohoMarketingHub.lead.UPDATE&response_type=code&client_id="+e.clientId+"&prompt=Consent&access_type=offline&redirect_uri="+encodeURIComponent(window.location.href)+"/redirect",c=window.open(l,"zohoMarkatingHub","width=400,height=609,toolbar=off"),d=setInterval((function(){if(c.closed){clearInterval(d);var a={},l=!1,f=localStorage.getItem("__bitforms_zohoMarkatingHub");if(f&&(l=!0,a=JSON.parse(f),localStorage.removeItem("__bitforms_zohoMarkatingHub")),a.code&&!a.error&&a&&l){var u=(0,n.Z)({},e);u.accountServer=a["accounts-server"],m(a,u,t,r,o,s)}else{var h=a.error?"Cause: "+a.error:"";s({show:!0,msg:(0,i.__)("Authorization failed","bitform")+" "+h+". "+(0,i.__)("please try again","bitform")}),o(!1)}}}),500)}else a({dataCenter:e.dataCenter?"":(0,i.__)("Data center cann't be empty","bitform"),clientId:e.clientId?"":(0,i.__)("Client ID cann't be empty","bitform"),clientSecret:e.clientSecret?"":(0,i.__)("Secret key cann't be empty","bitform")})},m=function(e,t,a,o,s,l){var c=(0,n.Z)({},e);c.dataCenter=t.dataCenter,c.clientId=t.clientId,c.clientSecret=t.clientSecret,c.redirectURI=encodeURIComponent(window.location.href)+"/redirect",(0,r.Z)(c,"bitforms_zmarketingHub_generate_token").then((function(e){if(e&&e.success){var r=(0,n.Z)({},t);r.tokenDetails=e.data,a(r),o(!0),l({show:!0,msg:(0,i.__)("Authorized Successfully","bitform")})}else e&&e.data&&e.data.data||!e.success&&"string"===typeof e.data?l({show:!0,msg:""+(0,i.__)("Authorization failed Cause:","bitform")+(e.data.data||e.data)+". "+(0,i.__)("please try again","bitform")}):l({show:!0,msg:(0,i.__)("Authorization failed. please try again","bitform")});s(!1)}))},u=function(){var e={},t=window.location.href.replace(window.opener.location.href+"/redirect","").split("&");t&&t.forEach((function(t){var a=t.split("=");a[1]&&(e[a[0]]=a[1])})),localStorage.setItem("__bitforms_zohoMarkatingHub",JSON.stringify(e)),window.close()}}}]);