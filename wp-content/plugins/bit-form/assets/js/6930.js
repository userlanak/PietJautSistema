(self.webpackChunk_bitforms=self.webpackChunk_bitforms||[]).push([[6930],{5813:function(e,t,n){"use strict";n.d(t,{Z:function(){return s}});var l=n(5637),i=n(5893);function s(e){var t=e.step,n=e.saveConfig,s=e.edit,a=e.disabled;return s?(0,i.jsx)("div",{className:"txt-center w-9 mt-3",children:(0,i.jsx)("button",{onClick:n,className:"btn btcd-btn-lg green sh-sm flx",type:"button",disabled:a,children:(0,l.__)("Save","bitform")})}):(0,i.jsxs)("div",{className:"btcd-stp-page txt-center",style:{width:3===t&&"90%",height:3===t&&"100%"},children:[(0,i.jsx)("h2",{className:"ml-3",children:(0,l.__)("Successfully Integrated","bitform")}),(0,i.jsxs)("button",{onClick:n,className:"btn btcd-btn-lg green sh-sm",type:"button",children:[(0,l.__)("Finish & Save ","bitform"),"✔"]})]})}},2515:function(e,t,n){"use strict";n.d(t,{Rx:function(){return a},aS:function(){return r},e1:function(){return d},Pl:function(){return u},Pd:function(){return o}});var l=n(2122),i=n(5637),s=n(9492),a=function(e,t,n){var i=(0,l.Z)({},t);i.name=e.target.value,n((0,l.Z)({},i))},r=function(e,t,n,a){n(!0);var r={api_key:e.api_key};(0,s.Z)(r,"bitforms_sblue_refresh_lists").then((function(s){if(s&&s.success){var r=(0,l.Z)({},e);r.default||(r.default={}),s.data.sblueList&&(r.default.sblueList=s.data.sblueList),a({show:!0,msg:(0,i.__)("List refreshed","bitform")}),t((0,l.Z)({},r))}else s&&s.data&&s.data.data||!s.success&&"string"===typeof s.data?a({show:!0,msg:(0,i.g)((0,i.__)("List refresh failed Cause: %s. please try again","bitform"),s.data.data||s.data)}):a({show:!0,msg:(0,i.__)("List failed. please try again","bitform")});n(!1)})).catch((function(){return n(!1)}))},d=function(e,t,n){var a={api_key:e.api_key};(0,s.Z)(a,"bitforms_sblue_refresh_template").then((function(s){if(s&&s.success){var a=(0,l.Z)({},e);a.default||(a.default={}),s.data.sblueTemplates&&(a.default.sblueTemplates=s.data.sblueTemplates),n({show:!0,msg:(0,i.__)("Templates refreshed","bitform")}),t((0,l.Z)({},a))}else s&&s.data&&s.data.data||!s.success&&"string"===typeof s.data?n({show:!0,msg:(0,i.g)((0,i.__)("Templates refresh failed Cause: %s. please try again","bitform"),s.data.data||s.data)}):n({show:!0,msg:(0,i.__)("Templates failed. please try again","bitform")})}))},u=function(e,t,n,a){var r={api_key:e.api_key};(0,s.Z)(r,"bitforms_sblue_headers").then((function(s){if(s&&s.success){var r=(0,l.Z)({},e);if(s.data.sendinBlueField){r.default.fields=s.data.sendinBlueField;var d=r.default.fields;r.field_map=Object.values(d).filter((function(e){return e.required})).map((function(e){return{formField:"",sendinBlueField:e.fieldId,required:!0}})),a({show:!0,msg:(0,i.__)("Sendinblue fields refreshed","bitform")})}else a({show:!0,msg:(0,i.__)("No Sendinblue fields found. Try changing the header row number or try again","bitform")});t((0,l.Z)({},r))}else a({show:!0,msg:(0,i.__)("Sendinblue fields refresh failed. please try again","bitform")});n(!1)})).catch((function(){return n(!1)}))},o=function(e){var t,n=null!=e&&e.field_map?e.field_map.filter((function(e){return!e.formField&&e.sendinBlueField&&e.required})):[];return(!e.lists||void 0!==(null==(t=e.lists)?void 0:t.length))&&!(n.length>0)}},9652:function(e,t,n){"use strict";n.d(t,{Z:function(){return b}});var l=n(2122),i=n(7707),s=n(5637),a=n(8381),r=n(4383),d=(n(2249),n(3921)),u=n(2515),o=n(5893);function c(e){var t,n,i=e.sendinBlueConf,a=e.setSendinBlueConf,r=(e.setisLoading,e.setSnackbar),c=function(e,t){var n=(0,l.Z)({},i);"update"===t&&(e.target.checked?n.actions.update=!0:delete n.actions.update),"double_optin"===t&&(e.target.checked?(n.actions.double_optin=!0,n.templateId="",n.redirectionUrl="",(0,u.e1)(n,a,r)):(delete n.actions.double_optin,delete n.templateId,delete n.redirectionUrl)),a((0,l.Z)({},n))};return(0,o.jsxs)("div",{className:"pos-rel d-flx w-8",children:[(0,o.jsx)(d.Z,{checked:(null==(t=i.actions)?void 0:t.update)||!1,onChange:function(e){return c(e,"update")},className:"wdt-200 mt-4 mr-2",value:"user_share",title:(0,s.__)("Update Sendinblue","bitform"),subTitle:(0,s.__)("Update Responses with Sendinblue existing email?","bitform")}),(0,o.jsx)(d.Z,{checked:(null==(n=i.actions)?void 0:n.double_optin)||!1,onChange:function(e){return c(e,"double_optin")},className:"wdt-200 mt-4 mr-2",value:"double_optin",title:(0,s.__)("Double Opt-in","bitform"),subTitle:(0,s.__)("Double Opt-In for confirm subscription.","bitform")})]})}var f=n(8530);function m(e){var t,n,i,a=e.i,r=e.formFields,d=e.field,u=e.sendinBlueConf,c=e.setSendinBlueConf,m=d.required,b=(null==u||null==(t=u.default)?void 0:t.fields)&&Object.values(null==u||null==(n=u.default)?void 0:n.fields).filter((function(e){return!e.required})),p=function(e,t){var n=(0,l.Z)({},u);n.field_map[t][e.target.name]=e.target.value,"custom"===e.target.value&&(n.field_map[t].customValue=""),c(n)};return(0,o.jsxs)("div",{className:m?"mt-2 mr-1 flx w-9":"flx flx-around mt-2 mr-1",children:[(0,o.jsxs)("select",{className:"btcd-paper-inp mr-2",name:"formField",value:d.formField||"",onChange:function(e){return p(e,a)},children:[(0,o.jsx)("option",{value:"",children:(0,s.__)("Select Field","bitform")}),r.map((function(e){return"file-up"!==e.type&&(0,o.jsx)("option",{value:e.key,children:e.name},"ff-zhcrm-"+e.key)})),(0,o.jsx)("option",{value:"custom",children:(0,s.__)("Custom...","bitform")})]}),"custom"===d.formField&&(0,o.jsx)(f.Z,{onChange:function(e){return function(e,t){var n=(0,l.Z)({},u);n.field_map[t].customValue=e.target.value,c(n)}(e,a)},label:(0,s.__)("Custom Value","bitform"),className:"mr-2",type:"text",value:d.customValue,placeholder:(0,s.__)("Custom Value","bitform")}),(0,o.jsxs)("select",{className:"btcd-paper-inp",name:"sendinBlueField",value:d.sendinBlueField,onChange:function(e){return p(e,a)},disabled:m,children:[(0,o.jsx)("option",{value:"",children:(0,s.__)("Select Field","bitform")}),m?(null==u||null==(i=u.default)?void 0:i.fields)&&Object.values(u.default.fields).map((function(e){return(0,o.jsx)("option",{value:e.fieldId,children:e.fieldName},e.fieldId+"-1")})):b&&b.map((function(e){return(0,o.jsx)("option",{value:e.fieldId,children:e.fieldName},e.fieldId+"-1")}))]}),!m&&(0,o.jsxs)(o.Fragment,{children:[(0,o.jsx)("button",{onClick:function(){return function(e){var t=(0,l.Z)({},u);t.field_map.splice(e,0,{}),c(t)}(a)},className:"icn-btn sh-sm ml-2",type:"button",children:"+"}),(0,o.jsx)("button",{onClick:function(){return function(e){var t=(0,l.Z)({},u);t.field_map.length>1&&t.field_map.splice(e,1),c(t)}(a)},className:"icn-btn sh-sm ml-2",type:"button","aria-label":"btn",children:(0,o.jsx)("span",{className:"btcd-icn icn-trash-2"})})]})]})}function b(e){e.formID;var t,n,d,f=e.formFields,b=e.sendinBlueConf,p=e.setSendinBlueConf,h=e.isLoading,x=e.setisLoading,_=e.setSnackbar,v=e.error,j=e.setError,g=function(e){var t=(0,l.Z)({},b),n=(0,l.Z)({},v);n[e.target.name]="",t[e.target.name]=e.target.value,j(n),p((0,l.Z)({},t))};return(0,o.jsxs)(o.Fragment,{children:[(0,o.jsx)("br",{}),(0,o.jsxs)("div",{className:"flx",children:[(0,o.jsx)("b",{className:"wdt-150 d-in-b",children:(0,s.__)("List: ","bitform")}),(0,o.jsx)(i.Z,{defaultValue:null==b?void 0:b.lists,className:"btcd-paper-drpdwn w-5",options:function(){var e;return null!=b&&null!=(e=b.default)&&e.sblueList?Object.values(b.default.sblueList).map((function(e){return{label:e.name,value:String(e.id)}})):[]}(),onChange:function(e){return function(e){var t=(0,l.Z)({},b);e?(t.lists=e?e.split(","):[],!t.default.fields&&(0,u.Pl)(t,p,x,_)):delete t.lists,p((0,l.Z)({},t))}(e)}}),(0,o.jsx)("button",{onClick:function(){return(0,u.aS)(b,p,x,_)},className:"icn-btn sh-sm ml-2 mr-2 tooltip",style:{"--tooltip-txt":"'"+(0,s.__)("Refresh Sendinblue Lists","bitform")+"'"},type:"button",disabled:h,children:"↻"})]}),(0,o.jsx)("br",{}),(0,o.jsx)("br",{}),h&&(0,o.jsx)(a.default,{style:{display:"flex",justifyContent:"center",alignItems:"center",height:100,transform:"scale(0.7)"}}),0!==(null==b||null==(t=b.lists)?void 0:t.length)&&(0,o.jsxs)(o.Fragment,{children:[(0,o.jsx)("div",{className:"mt-4",children:(0,o.jsx)("b",{className:"wdt-100",children:(0,s.__)("Map Fields","bitform")})}),(0,o.jsx)("div",{className:"btcd-hr mt-1"}),(0,o.jsxs)("div",{className:"flx flx-around mt-2 mb-1",children:[(0,o.jsx)("div",{className:"txt-dp",children:(0,o.jsx)("b",{children:(0,s.__)("Form Fields","bitform")})}),(0,o.jsx)("div",{className:"txt-dp",children:(0,o.jsx)("b",{children:(0,s.__)("Sendinblue Fields","bitform")})})]}),b.field_map.map((function(e,t){return(0,o.jsx)(m,{i:t,field:e,sendinBlueConf:b,formFields:f,setSendinBlueConf:p},"sendinblue-m-"+(t+9))})),(0,o.jsx)("div",{className:"txt-center  mt-2",style:{marginRight:85},children:(0,o.jsx)("button",{onClick:function(){return(0,r.FP)(b.field_map.length,b,p)},className:"icn-btn sh-sm",type:"button",children:"+"})}),(0,o.jsx)("br",{}),(0,o.jsx)("br",{}),(null==(n=b.actions)?void 0:n.double_optin)&&(0,o.jsxs)(o.Fragment,{children:[(0,o.jsxs)("div",{className:"flx",children:[(0,o.jsx)("b",{className:"wdt-150 d-in-b",children:(0,s.__)("Template: ","bitform")}),(0,o.jsxs)("div",{className:"w-5",children:[(0,o.jsxs)("select",{onChange:g,name:"templateId",value:null==b?void 0:b.templateId,className:"btcd-paper-inp",children:[(0,o.jsx)("option",{value:"",children:(0,s.__)("Select Template","bitform")}),(null==b||null==(d=b.default)?void 0:d.sblueTemplates)&&Object.values(b.default.sblueTemplates).map((function(e){return(0,o.jsx)("option",{value:e.id||b.templateId,children:e.name},"sendinblue-"+(e.id+2))}))]}),(0,o.jsx)("div",{style:{color:"red",fontSize:"15px",marginTop:"3px"},children:v.templateId})]}),(0,o.jsx)("button",{onClick:function(){return(0,u.e1)(b,p,_)},className:"icn-btn sh-sm ml-2 mr-2 tooltip",style:{"--tooltip-txt":"'"+(0,s.__)("Refresh Sendinblue Templates","bitform")+"'"},type:"button",disabled:h,children:"↻"})]}),(0,o.jsx)("br",{}),(0,o.jsx)("br",{}),(0,o.jsxs)("div",{className:"flx",children:[(0,o.jsx)("b",{className:"wdt-150 d-in-b",children:(0,s.__)("RedirectionUrl:","bitform")}),(0,o.jsxs)("div",{className:"w-5",children:[(0,o.jsx)("input",{type:"url",className:"btcd-paper-inp",placeholder:"Redirection URL",onChange:g,value:(null==b?void 0:b.redirectionUrl)||"",name:"redirectionUrl"}),(0,o.jsx)("div",{style:{color:"red",fontSize:"15px",marginTop:"3px"},children:v.redirectionUrl})]})]}),(0,o.jsx)("br",{}),(0,o.jsx)("br",{})]}),(0,o.jsx)("div",{className:"mt-4",children:(0,o.jsx)("b",{className:"wdt-100",children:(0,s.__)("Actions","bitform")})}),(0,o.jsx)("div",{className:"btcd-hr mt-1"}),(0,o.jsx)(c,{sendinBlueConf:b,setSendinBlueConf:p,setisLoading:x,setSnackbar:_})]})]})}},8530:function(e,t,n){"use strict";var l=n(5893);t.Z=function(e){var t=e.label,n=e.onChange,i=e.value,s=e.disabled,a=e.type,r=e.textarea,d=e.className;return(0,l.jsxs)("label",{className:"btcd-mt-inp "+d,children:[!r&&(0,l.jsx)("input",{type:void 0===a?"text":a,onChange:n,placeholder:" ",disabled:s,value:i}),r&&(0,l.jsx)("textarea",{type:void 0===a?"text":a,onChange:n,placeholder:" ",disabled:s,value:i}),(0,l.jsx)("span",{children:t})]})}}}]);