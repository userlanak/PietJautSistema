(self.webpackChunk_bitforms=self.webpackChunk_bitforms||[]).push([[8797,5186],{5186:function(e,t,s){"use strict";s.r(t),s.d(t,{default:function(){return m}});var n=s(2122),a=s(7294),r=s(7707),l=s(7480),i=s(9492),c=s(5637),d=s(9348),o=s(5257),u=s(5893);function m(e){e.formID;var t,s=e.formFields,m=e.webHooks,b=e.setWebHooks,f=(e.step,e.setstep),h=e.setSnackbar,p=e.create,x=e.isInfo,v=function(e){return null==e?void 0:e.match(/(\?|&)([^=]+)=([^&]+|)/gi)},j=(0,a.useState)(!1),N=j[0],g=j[1],k=function(e,t,s){var a=(0,n.Z)({},m);""!==t?a.url="key"===e?a.url.replace(s,""+s.charAt(0)+t+"="+s.split("=")[1]):a.url.replace(s,s.split("=")[0]+"="+t):null===s.match(/\?/g)?a.url=a.url.replace(s,""):a.url=a.url.replace(s+"&","?"),b(a)},_=function(e){var t=(0,n.Z)({},m);t[e.target.name]=e.target.value,b((0,n.Z)({},t))};return(0,u.jsx)(u.Fragment,{children:(0,u.jsxs)("div",{style:(0,n.Z)({},{width:x&&900}),children:[(0,u.jsx)("div",{className:"flx ",children:(0,u.jsxs)("div",{className:"w-7 mr-2 mb-4",children:[(0,u.jsx)("div",{className:"f-m",children:(0,c.__)("Integration name","bitform")}),(0,u.jsx)("input",{name:"name",onChange:function(e){return _(e)},className:"btcd-paper-inp mt-1",type:"text",value:m.name,disabled:x})]})}),(0,u.jsxs)("div",{className:"flx",children:[(0,u.jsxs)("div",{className:"w-7 mr-2",children:[(0,u.jsx)("div",{className:"f-m",children:(0,c.__)("Link:","bitform")}),(0,u.jsx)("input",{name:"url",onChange:function(e){return _(e)},className:"btcd-paper-inp mt-1",type:"text",value:m.url,disabled:x}),(null==m?void 0:m.apiConsole)&&(0,u.jsxs)("small",{className:"d-blk mt-2",children:[(0,c.__)("To got Webhook , Please Visit","bitform")," ",(0,u.jsx)("a",{className:"btcd-link",href:m.apiConsole,target:"_blank",rel:"noreferrer",children:(0,c.__)(m.type+" Dashboard","bitform")})]})]}),(0,u.jsxs)("div",{className:"w-3",children:[(0,u.jsx)("div",{className:"f-m",children:(0,c.__)("Method:","bitform")}),(0,u.jsx)("select",{name:"method",onChange:function(e){return _(e)},defaultValue:m.method,className:"btcd-paper-inp mt-1",disabled:x,children:["GET","POST","PUT","PATCH","OPTION","DELETE","TRACE","CONNECT"].map((function(e,t){return(0,u.jsx)("option",{value:e,children:e},"method-"+t)}))})]})]}),!x&&(0,u.jsxs)(d.Z,{onClick:function(){return e=m,g(!0),void(0,i.Z)({hookDetails:e},"bitforms_test_webhook").then((function(e){if(e&&e.success)h({show:!0,msg:""+e.data}),g(!1);else if(e&&e.data){var t="string"===typeof e.data?e.data:"Unknown error";h({show:!0,msg:t+". "+(0,c.__)("please try again","bitform")}),g(!1)}else h({show:!0,msg:(0,c.__)("Webhook tests failed. please try again","bitform")}),g(!1)}));var e},className:"btn btcd-btn-o-blue",children:[(0,c.__)("Test Webhook","bitform"),N&&(0,u.jsx)(o.Z,{size:"14",clr:"#022217",className:"ml-2"})]}),(0,u.jsx)("br",{}),(0,u.jsx)("br",{}),(0,u.jsx)("div",{className:"f-m",children:(0,c.__)("Add Url Parameter: (optional)","bitform")}),(0,u.jsx)("div",{className:"btcd-param-t-wrp mt-1",children:(0,u.jsxs)("div",{className:"btcd-param-t",children:[(0,u.jsxs)("div",{className:"tr",children:[(0,u.jsx)("div",{className:"td",children:(0,c.__)("Key","bitform")}),(0,u.jsx)("div",{className:"td",children:(0,c.__)("Value","bitform")})]}),null!==v(m.url)&&(null==(t=v(m.url))?void 0:t.map((function(e,t){return(0,u.jsxs)("div",{className:"tr",children:[(0,u.jsx)("div",{className:"td",children:(0,u.jsx)("input",{className:"btcd-paper-inp p-i-sm",onChange:function(t){return k("key",t.target.value,e)},type:"text",value:e.split("=")[0].substr(1),disabled:x})}),(0,u.jsx)("div",{className:"td",children:(0,u.jsx)("input",{className:"btcd-paper-inp p-i-sm",onChange:function(t){return k("val",t.target.value,e)},type:"text",value:e.split("=")[1],disabled:x})}),!x&&(0,u.jsxs)("div",{className:"flx p-atn",children:[(0,u.jsx)(d.Z,{onClick:function(){return function(e){var t=(0,n.Z)({},m);t.url=t.url.replace(e,""),b(t)}(e)},icn:!0,children:(0,u.jsx)("span",{className:"btcd-icn icn-trash-2",style:{fontSize:16}})}),(0,u.jsx)(r.Z,{options:s.map((function(e){return{label:e.name,value:"${"+e.key+"}"}})),className:"btcd-paper-drpdwn wdt-200 ml-2",singleSelect:!0,onChange:function(t){return function(e,t){var s=(0,n.Z)({},m),a=t.split("=");a[1]=e,s.url=s.url.replace(t,a.join("=")),b(s)}(t,e)},defaultValue:e.split("=")[1]})]})]},"fu-1"+3*t)}))),!x&&(0,u.jsx)(d.Z,{onClick:function(){return function(){var e=(0,n.Z)({},m);null!==e.url.match(/\?/g)?e.url+="&key=value":e.url+="?key=value",b(e)}()},className:"add-pram",icn:!0,children:(0,u.jsx)(l.Z,{size:"14",className:"icn-rotate-45"})})]})}),p&&(0,u.jsxs)("button",{onClick:function(){f(2)},className:"btn btcd-btn-lg green sh-sm flx",type:"button",children:[(0,c.__)("Next","bitform"),(0,u.jsx)("div",{className:"btcd-icn icn-arrow_back rev-icn d-in-b"})]})]})})}},96:function(e,t,s){"use strict";s.d(t,{Z:function(){return r}});var n=s(5637),a=s(5893);function r(e){var t=e.step,s=e.saveConfig,r=e.edit,l=e.disabled;return r?(0,a.jsx)("div",{className:"txt-center w-9 mt-3",children:(0,a.jsx)("button",{onClick:s,className:"btn btcd-btn-lg green sh-sm flx",type:"button",disabled:l,children:(0,n.__)("Save","bitform")})}):(0,a.jsxs)("div",{className:"btcd-stp-page txt-center",style:{width:2===t&&"90%",height:2===t&&"100%"},children:[(0,a.jsx)("h2",{className:"ml-3",children:(0,n.__)("Successfully Integrated","bitform")}),(0,a.jsxs)("button",{onClick:s,className:"btn btcd-btn-lg green sh-sm",type:"button",children:[(0,n.__)("Finish & Save ","bitform"),"✔"]})]})}},8797:function(e,t,s){"use strict";s.r(t);var n=s(2122),a=s(7294),r=s(5977),l=s(5001),i=s(4383),c=s(5186),d=s(96),o=s(5893);t.default=function(e){var t=e.formFields,s=e.setIntegration,u=e.integrations,m=e.allIntegURL,b=(0,r.k6)(),f=(0,r.UO)(),h=f.id,p=f.formID,x=(0,a.useState)((0,n.Z)({},u[h])),v=x[0],j=x[1],N=(0,a.useState)({show:!1}),g=N[0],k=N[1];return(0,o.jsxs)("div",{style:{width:900},children:[(0,o.jsx)(l.Z,{snack:g,setSnackbar:k}),(0,o.jsx)("div",{className:"mt-3",children:(0,o.jsx)(c.default,{formID:p,formFields:t,webHooks:v,setWebHooks:j,setSnackbar:k})}),void 0,(0,o.jsx)(d.Z,{edit:!0,saveConfig:function(){return(0,i.Mm)(u,s,m,v,b,h,1)}}),(0,o.jsx)("br",{})]})}},9348:function(e,t,s){"use strict";var n=s(5893);t.Z=function(e){var t=e.className,s=e.type,a=e.onClick,r=e.icn,l=e.children,i=e.style;return(0,n.jsx)("button",{style:i,className:(r?"icn-btn":"btn")+"  "+t,type:s||"button",onClick:a,"aria-label":"btcd-button",children:l})}}}]);