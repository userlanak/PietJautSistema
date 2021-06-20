(self.webpackChunk_bitforms=self.webpackChunk_bitforms||[]).push([[7525],{7525:function(e,t,s){"use strict";s.r(t);var i=s(7294),n=s(5637),a=(s(8774),s(5977)),l=s(5001),r=s(3231),c=s(3319),d=s(5813),o=s(2957),m=s(3849),f=s(7426),b=s(5893);t.default=function(e){var t=e.formFields,s=e.setIntegration,h=e.integrations,u=e.allIntegURL,p=(0,a.k6)(),x=(0,a.UO)().formID,j=(0,i.useState)(!1),g=j[0],v=j[1],_=(0,i.useState)(1),N=_[0],C=_[1],S=(0,i.useState)({show:!1}),k=S[0],w=S[1],I=(0,i.useState)({name:"Mail Chimp API",type:"Mail Chimp",clientId:"",clientSecret:"",listId:"",listName:"",tags:"",field_map:[{formField:"",mailChimpField:""}],address_field:[],actions:{}}),y=I[0],Z=I[1];return(0,i.useEffect)((function(){window.opener&&(0,o.WK)("mailChimp")}),[]),document.querySelector(".btcd-s-wrp").scrollTop=0,(0,b.jsxs)("div",{children:[(0,b.jsx)(l.Z,{snack:k,setSnackbar:w}),(0,b.jsx)("div",{className:"txt-center w-9 mt-2",children:(0,b.jsx)(r.Z,{step:3,active:N})}),(0,b.jsx)(f.default,{formID:x,sheetConf:y,setSheetConf:Z,step:N,setstep:C,isLoading:g,setisLoading:v,setSnackbar:w}),(0,b.jsxs)("div",{className:"btcd-stp-page",style:{width:2===N&&900,height:2===N&&"100%"},children:[(0,b.jsx)(m.Z,{formID:x,formFields:t,handleInput:function(e){return(0,o.Rx)(e,y,Z,x,v,w)},sheetConf:y,setSheetConf:Z,isLoading:g,setisLoading:v,setSnackbar:w}),(0,b.jsxs)("button",{onClick:function(){return function(){var e;null==(e=y.actions)||!e.address||(0,o.a7)(y)?""!==y.listId&&C(3):w({show:!0,msg:"Please map address required fields to continue."})}()},disabled:!y.listId||y.field_map.length<1,className:"btn f-right btcd-btn-lg green sh-sm flx",type:"button",children:[(0,n.__)("Next","bitform")," "," ",(0,b.jsx)("div",{className:"btcd-icn icn-arrow_back rev-icn d-in-b"})]})]}),(0,b.jsx)(d.Z,{step:N,saveConfig:function(){return(0,c.Mm)(h,s,u,y,p)}})]})}},7426:function(e,t,s){"use strict";s.r(t),s.d(t,{default:function(){return o}});var i=s(2122),n=s(7294),a=s(5637),l=s(5257),r=s(9151),c=s(2957),d=s(5893);function o(e){var t=e.formID,s=e.sheetConf,o=e.setSheetConf,m=e.step,f=e.setstep,b=e.isLoading,h=e.setisLoading,u=e.setSnackbar,p=e.redirectLocation,x=e.isInfo,j=(0,n.useState)(!1),g=j[0],v=j[1],_=(0,n.useState)({dataCenter:"",clientId:"",clientSecret:""}),N=_[0],C=_[1],S=function(e){var t=(0,i.Z)({},s),n=(0,i.Z)({},N);n[e.target.name]="",t[e.target.name]=e.target.value,C(n),o(t)};return(0,d.jsxs)("div",{className:"btcd-stp-page",style:(0,i.Z)({},{width:1===m&&900},{height:1===m&&"100%"}),children:[(0,d.jsx)("div",{className:"mt-3",children:(0,d.jsx)("b",{children:(0,a.__)("Integration Name:","bitform")})}),(0,d.jsx)("input",{className:"btcd-paper-inp w-6 mt-1",onChange:S,name:"name",value:s.name,type:"text",placeholder:(0,a.__)("Integration Name...","bitform"),disabled:x}),(0,d.jsx)("div",{className:"mt-3",children:(0,d.jsx)("b",{children:(0,a.__)("Homepage URL:","bitform")})}),(0,d.jsx)(r.Z,{value:""+window.location.origin,setSnackbar:u,className:"field-key-cpy w-6 ml-0",readOnly:x}),(0,d.jsx)("div",{className:"mt-3",children:(0,d.jsx)("b",{children:(0,a.__)("Authorized Redirect URIs:","bitform")})}),(0,d.jsx)(r.Z,{value:p||""+window.location.href,setSnackbar:u,className:"field-key-cpy w-6 ml-0",readOnly:x}),(0,d.jsxs)("small",{className:"d-blk mt-5",children:[(0,a.__)("To get Client ID and SECRET , Please Visit","bitform")," ",(0,d.jsx)("a",{className:"btcd-link",href:"https://us7.admin.mailchimp.com/account/oauth2/",target:"_blank",rel:"noreferrer",children:(0,a.__)("Mail Chimp API Console","bitform")})]}),(0,d.jsx)("div",{className:"mt-3",children:(0,d.jsx)("b",{children:(0,a.__)("Client id:","bitform")})}),(0,d.jsx)("input",{className:"btcd-paper-inp w-6 mt-1",onChange:S,name:"clientId",value:s.clientId,type:"text",placeholder:(0,a.__)("Client id...","bitform"),disabled:x}),(0,d.jsx)("div",{style:{color:"red",fontSize:"15px"},children:N.clientId}),(0,d.jsx)("div",{className:"mt-3",children:(0,d.jsx)("b",{children:(0,a.__)("Client secret:","bitform")})}),(0,d.jsx)("input",{className:"btcd-paper-inp w-6 mt-1",onChange:S,name:"clientSecret",value:s.clientSecret,type:"text",placeholder:(0,a.__)("Client secret...","bitform"),disabled:x}),(0,d.jsx)("div",{style:{color:"red",fontSize:"15px"},children:N.clientSecret}),!x&&(0,d.jsxs)(d.Fragment,{children:[(0,d.jsxs)("button",{onClick:function(){return(0,c.Lx)("mailChimp","mChimp",s,o,C,v,h,u)},className:"btn btcd-btn-lg green sh-sm flx",type:"button",disabled:g,children:[g?(0,a.__)("Authorized ✔","bitform"):(0,a.__)("Authorize","bitform"),b&&(0,d.jsx)(l.Z,{size:"20",clr:"#022217",className:"ml-2"})]}),(0,d.jsx)("br",{}),(0,d.jsxs)("button",{onClick:function(){f(2),(0,c.qC)(t,s,o,h,u),document.querySelector(".btcd-s-wrp").scrollTop=0},className:"btn f-right btcd-btn-lg green sh-sm flx",type:"button",disabled:!g,children:[(0,a.__)("Next","bitform")," "," ",(0,d.jsx)("div",{className:"btcd-icn icn-arrow_back rev-icn d-in-b"})]})]})]})}},3231:function(e,t,s){"use strict";var i=s(7294),n=s(5893);t.Z=function(e){var t=e.step,s=e.active,a=e.className;return(0,n.jsx)("div",{className:"d-in-b "+a,children:(0,n.jsxs)("div",{className:"flx flx-center",children:[Array(s).fill(0).map((function(e,t){return(0,n.jsxs)(i.Fragment,{children:[(0,n.jsx)("div",{className:"btcd-stp flx flx-center stp-a  txt-center",children:t+1}),s-1!==t&&(0,n.jsx)("div",{className:"btcd-stp-line stp-line-a"})]},"stp-"+(t+21))})),t-s!==0&&(0,n.jsx)("div",{className:"btcd-stp-line"}),Array(t-s).fill(0).map((function(e,a){return(0,n.jsxs)(i.Fragment,{children:[(0,n.jsx)("div",{className:"btcd-stp flx flx-center txt-center",children:a+s+1}),t-s-1!==a&&(0,n.jsx)("div",{className:"btcd-stp-line "})]},"stp-"+(a+23))}))]})})}}}]);