(self.webpackChunk_bitforms=self.webpackChunk_bitforms||[]).push([[3981,5186],{5186:function(e,t,s){"use strict";s.r(t),s.d(t,{default:function(){return m}});var a=s(2122),n=s(7294),l=s(7707),r=s(7480),i=s(9492),c=s(5637),d=s(9348),o=s(5257),u=s(5893);function m(e){e.formID;var t,s=e.formFields,m=e.webHooks,p=e.setWebHooks,b=(e.step,e.setstep),f=e.setSnackbar,h=e.create,x=e.isInfo,v=function(e){return null==e?void 0:e.match(/(\?|&)([^=]+)=([^&]+|)/gi)},j=(0,n.useState)(!1),N=j[0],g=j[1],k=function(e,t,s){var n=(0,a.Z)({},m);""!==t?n.url="key"===e?n.url.replace(s,""+s.charAt(0)+t+"="+s.split("=")[1]):n.url.replace(s,s.split("=")[0]+"="+t):null===s.match(/\?/g)?n.url=n.url.replace(s,""):n.url=n.url.replace(s+"&","?"),p(n)},_=function(e){var t=(0,a.Z)({},m);t[e.target.name]=e.target.value,p((0,a.Z)({},t))};return(0,u.jsx)(u.Fragment,{children:(0,u.jsxs)("div",{style:(0,a.Z)({},{width:x&&900}),children:[(0,u.jsx)("div",{className:"flx ",children:(0,u.jsxs)("div",{className:"w-7 mr-2 mb-4",children:[(0,u.jsx)("div",{className:"f-m",children:(0,c.__)("Integration name","bitform")}),(0,u.jsx)("input",{name:"name",onChange:function(e){return _(e)},className:"btcd-paper-inp mt-1",type:"text",value:m.name,disabled:x})]})}),(0,u.jsxs)("div",{className:"flx",children:[(0,u.jsxs)("div",{className:"w-7 mr-2",children:[(0,u.jsx)("div",{className:"f-m",children:(0,c.__)("Link:","bitform")}),(0,u.jsx)("input",{name:"url",onChange:function(e){return _(e)},className:"btcd-paper-inp mt-1",type:"text",value:m.url,disabled:x}),(null==m?void 0:m.apiConsole)&&(0,u.jsxs)("small",{className:"d-blk mt-2",children:[(0,c.__)("To got Webhook , Please Visit","bitform")," ",(0,u.jsx)("a",{className:"btcd-link",href:m.apiConsole,target:"_blank",rel:"noreferrer",children:(0,c.__)(m.type+" Dashboard","bitform")})]})]}),(0,u.jsxs)("div",{className:"w-3",children:[(0,u.jsx)("div",{className:"f-m",children:(0,c.__)("Method:","bitform")}),(0,u.jsx)("select",{name:"method",onChange:function(e){return _(e)},defaultValue:m.method,className:"btcd-paper-inp mt-1",disabled:x,children:["GET","POST","PUT","PATCH","OPTION","DELETE","TRACE","CONNECT"].map((function(e,t){return(0,u.jsx)("option",{value:e,children:e},"method-"+t)}))})]})]}),!x&&(0,u.jsxs)(d.Z,{onClick:function(){return e=m,g(!0),void(0,i.Z)({hookDetails:e},"bitforms_test_webhook").then((function(e){if(e&&e.success)f({show:!0,msg:""+e.data}),g(!1);else if(e&&e.data){var t="string"===typeof e.data?e.data:"Unknown error";f({show:!0,msg:t+". "+(0,c.__)("please try again","bitform")}),g(!1)}else f({show:!0,msg:(0,c.__)("Webhook tests failed. please try again","bitform")}),g(!1)}));var e},className:"btn btcd-btn-o-blue",children:[(0,c.__)("Test Webhook","bitform"),N&&(0,u.jsx)(o.Z,{size:"14",clr:"#022217",className:"ml-2"})]}),(0,u.jsx)("br",{}),(0,u.jsx)("br",{}),(0,u.jsx)("div",{className:"f-m",children:(0,c.__)("Add Url Parameter: (optional)","bitform")}),(0,u.jsx)("div",{className:"btcd-param-t-wrp mt-1",children:(0,u.jsxs)("div",{className:"btcd-param-t",children:[(0,u.jsxs)("div",{className:"tr",children:[(0,u.jsx)("div",{className:"td",children:(0,c.__)("Key","bitform")}),(0,u.jsx)("div",{className:"td",children:(0,c.__)("Value","bitform")})]}),null!==v(m.url)&&(null==(t=v(m.url))?void 0:t.map((function(e,t){return(0,u.jsxs)("div",{className:"tr",children:[(0,u.jsx)("div",{className:"td",children:(0,u.jsx)("input",{className:"btcd-paper-inp p-i-sm",onChange:function(t){return k("key",t.target.value,e)},type:"text",value:e.split("=")[0].substr(1),disabled:x})}),(0,u.jsx)("div",{className:"td",children:(0,u.jsx)("input",{className:"btcd-paper-inp p-i-sm",onChange:function(t){return k("val",t.target.value,e)},type:"text",value:e.split("=")[1],disabled:x})}),!x&&(0,u.jsxs)("div",{className:"flx p-atn",children:[(0,u.jsx)(d.Z,{onClick:function(){return function(e){var t=(0,a.Z)({},m);t.url=t.url.replace(e,""),p(t)}(e)},icn:!0,children:(0,u.jsx)("span",{className:"btcd-icn icn-trash-2",style:{fontSize:16}})}),(0,u.jsx)(l.Z,{options:s.map((function(e){return{label:e.name,value:"${"+e.key+"}"}})),className:"btcd-paper-drpdwn wdt-200 ml-2",singleSelect:!0,onChange:function(t){return function(e,t){var s=(0,a.Z)({},m),n=t.split("=");n[1]=e,s.url=s.url.replace(t,n.join("=")),p(s)}(t,e)},defaultValue:e.split("=")[1]})]})]},"fu-1"+3*t)}))),!x&&(0,u.jsx)(d.Z,{onClick:function(){return function(){var e=(0,a.Z)({},m);null!==e.url.match(/\?/g)?e.url+="&key=value":e.url+="?key=value",p(e)}()},className:"add-pram",icn:!0,children:(0,u.jsx)(r.Z,{size:"14",className:"icn-rotate-45"})})]})}),h&&(0,u.jsxs)("button",{onClick:function(){b(2)},className:"btn btcd-btn-lg green sh-sm flx",type:"button",children:[(0,c.__)("Next","bitform"),(0,u.jsx)("div",{className:"btcd-icn icn-arrow_back rev-icn d-in-b"})]})]})})}},96:function(e,t,s){"use strict";s.d(t,{Z:function(){return l}});var a=s(5637),n=s(5893);function l(e){var t=e.step,s=e.saveConfig,l=e.edit,r=e.disabled;return l?(0,n.jsx)("div",{className:"txt-center w-9 mt-3",children:(0,n.jsx)("button",{onClick:s,className:"btn btcd-btn-lg green sh-sm flx",type:"button",disabled:r,children:(0,a.__)("Save","bitform")})}):(0,n.jsxs)("div",{className:"btcd-stp-page txt-center",style:{width:2===t&&"90%",height:2===t&&"100%"},children:[(0,n.jsx)("h2",{className:"ml-3",children:(0,a.__)("Successfully Integrated","bitform")}),(0,n.jsxs)("button",{onClick:s,className:"btn btcd-btn-lg green sh-sm",type:"button",children:[(0,a.__)("Finish & Save ","bitform"),"✔"]})]})}},3981:function(e,t,s){"use strict";s.r(t);var a=s(2122),n=s(7294),l=(s(8774),s(5977)),r=s(5001),i=s(3231),c=s(4383),d=s(5186),o=s(96),u=s(5893);t.default=function(e){var t=e.formFields,s=e.setIntegration,m=e.integrations,p=e.allIntegURL,b=(0,l.k6)(),f=(0,l.UO)().formID,h=(0,n.useState)(1),x=h[0],v=h[1],j=(0,n.useState)({show:!1}),N=j[0],g=j[1],k=(0,n.useState)({name:"Zapier Web Hooks",type:"Zapier",method:"POST",url:"",apiConsole:"https://zapier.com/app/dashboard"}),_=k[0],y=k[1];return(0,u.jsxs)("div",{children:[(0,u.jsx)(r.Z,{snack:N,setSnackbar:g}),(0,u.jsx)("div",{className:"txt-center w-9 mt-2",children:(0,u.jsx)(i.Z,{step:2,active:x})}),(0,u.jsx)("div",{className:"btcd-stp-page",style:(0,a.Z)({},{width:1===x&&900},{height:1===x&&"100%"}),children:(0,u.jsx)(d.default,{formID:f,formFields:t,webHooks:_,setWebHooks:y,step:x,setstep:v,setSnackbar:g,create:!0})}),(0,u.jsx)("div",{className:"btcd-stp-page",style:{width:2===x&&900,minHeight:2===x&&"900px"},children:(0,u.jsx)(o.Z,{step:x,saveConfig:function(){return(0,c.Mm)(m,s,p,_,b)}})})]})}},9348:function(e,t,s){"use strict";var a=s(5893);t.Z=function(e){var t=e.className,s=e.type,n=e.onClick,l=e.icn,r=e.children,i=e.style;return(0,a.jsx)("button",{style:i,className:(l?"icn-btn":"btn")+"  "+t,type:s||"button",onClick:n,"aria-label":"btcd-button",children:r})}},3231:function(e,t,s){"use strict";var a=s(7294),n=s(5893);t.Z=function(e){var t=e.step,s=e.active,l=e.className;return(0,n.jsx)("div",{className:"d-in-b "+l,children:(0,n.jsxs)("div",{className:"flx flx-center",children:[Array(s).fill(0).map((function(e,t){return(0,n.jsxs)(a.Fragment,{children:[(0,n.jsx)("div",{className:"btcd-stp flx flx-center stp-a  txt-center",children:t+1}),s-1!==t&&(0,n.jsx)("div",{className:"btcd-stp-line stp-line-a"})]},"stp-"+(t+21))})),t-s!==0&&(0,n.jsx)("div",{className:"btcd-stp-line"}),Array(t-s).fill(0).map((function(e,l){return(0,n.jsxs)(a.Fragment,{children:[(0,n.jsx)("div",{className:"btcd-stp flx flx-center txt-center",children:l+s+1}),t-s-1!==l&&(0,n.jsx)("div",{className:"btcd-stp-line "})]},"stp-"+(l+23))}))]})})}}}]);