(self.webpackChunk_bitforms=self.webpackChunk_bitforms||[]).push([[4771],{9134:function(e,t,i){"use strict";i.d(t,{Rx:function(){return l},in:function(){return r},Pd:function(){return c}});var n=i(2122),a=i(4866),s=i(9492),l=function(e,t,i){var a=(0,n.Z)({},t);a.name=e.target.value,i((0,n.Z)({},a))},r=function(e,t,i,l){var r={api_key:e.api_key,api_url:e.api_url};(0,s.Z)(r,"bitforms_aCampaign_headers").then((function(s){if(s&&s.success){var r=(0,n.Z)({},e);if(s.data.activeCampaignField){r.default||(r.default={}),r.default.fields=s.data.activeCampaignField;var c=r.default.fields;r.field_map=Object.values(c).filter((function(e){return e.required})).map((function(e){return{formField:"",activeCampaignField:e.fieldId,required:!0}})),l({show:!0,msg:(0,a.__)("ActiveCampaign fields refreshed","bitform")})}else l({show:!0,msg:(0,a.__)("No ActiveCampaign fields found. Try changing the header row number or try again","bitform")});t((0,n.Z)({},r))}else l({show:!0,msg:(0,a.__)("ActiveCampaign fields refresh failed. please try again","bitform")});i(!1)})).catch((function(){return i(!1)}))},c=function(e){return!((null!=e&&e.field_map?e.field_map.filter((function(e){return!e.formField&&e.activeCampaignField&&e.required})):[]).length>0)}},3494:function(e,t,i){"use strict";i.d(t,{Z:function(){return u}});var n=i(4866),a=(i(8381),i(4383)),s=i(2122),l=i(3921),r=i(5893);function c(e){var t,i=e.activeCampaingConf,a=e.setActiveCampaingConf;return(0,r.jsx)("div",{className:"pos-rel d-flx w-8",children:(0,r.jsx)(l.Z,{checked:(null==(t=i.actions)?void 0:t.update)||!1,onChange:function(e){return function(e,t){var n=(0,s.Z)({},i);"update"===t&&(e.target.checked?n.actions.update=!0:delete n.actions.update),a((0,s.Z)({},n))}(e,"update")},className:"wdt-200 mt-4 mr-2",value:"user_share",title:(0,n.__)("Update ActiveCampaign","bitform"),subTitle:(0,n.__)("Update Responses with ActiveCampaign existing email?","bitform")})})}var d=i(8530);function o(e){var t,i,a,l=e.i,c=e.formFields,o=e.field,u=e.activeCampaingConf,m=e.setActiveCampaingConf,f=o.required,p=(null==u||null==(t=u.default)?void 0:t.fields)&&Object.values(null==u||null==(i=u.default)?void 0:i.fields).filter((function(e){return!e.required})),v=function(e,t){var i=(0,s.Z)({},u);i.field_map[t][e.target.name]=e.target.value,"custom"===e.target.value&&(i.field_map[t].customValue=""),m(i)};return(0,r.jsxs)("div",{className:f?"mt-2 mr-1":"flx flx-around mt-2 mr-1",children:[(0,r.jsxs)("select",{className:"btcd-paper-inp mr-2",name:"formField",value:o.formField||"",onChange:function(e){return v(e,l)},children:[(0,r.jsx)("option",{value:"",children:(0,n.__)("Select Field","bitform")}),c.map((function(e){return"file-up"!==e.type&&(0,r.jsx)("option",{value:e.key,children:e.name},"ff-zhcrm-"+e.key)})),(0,r.jsx)("option",{value:"custom",children:(0,n.__)("Custom...","bitform")})]}),"custom"===o.formField&&(0,r.jsx)(d.Z,{onChange:function(e){return function(e,t){var i=(0,s.Z)({},u);i.field_map[t].customValue=e.target.value,m(i)}(e,l)},label:(0,n.__)("Custom Value","bitform"),className:"mr-2",type:"text",value:o.customValue,placeholder:(0,n.__)("Custom Value","bitform")}),(0,r.jsxs)("select",{className:"btcd-paper-inp",name:"activeCampaignField",value:o.activeCampaignField,onChange:function(e){return v(e,l)},disabled:f,children:[(0,r.jsx)("option",{value:"",children:(0,n.__)("Select Field","bitform")}),f?(null==u||null==(a=u.default)?void 0:a.fields)&&Object.values(u.default.fields).map((function(e){return(0,r.jsx)("option",{value:e.fieldId,children:e.fieldName},e.fieldId+"-1")})):p&&p.map((function(e){return(0,r.jsx)("option",{value:e.fieldId,children:e.fieldName},e.fieldId+"-1")}))]}),!f&&(0,r.jsxs)(r.Fragment,{children:[(0,r.jsx)("button",{onClick:function(){return function(e){var t=(0,s.Z)({},u);t.field_map.splice(e,0,{}),m(t)}(l)},className:"icn-btn sh-sm ml-2",type:"button",children:"+"}),(0,r.jsx)("button",{onClick:function(){return function(e){var t=(0,s.Z)({},u);t.field_map.length>1&&t.field_map.splice(e,1),m(t)}(l)},className:"icn-btn sh-sm ml-2",type:"button","aria-label":"btn",children:(0,r.jsx)("span",{className:"btcd-icn icn-trash-2"})})]})]})}function u(e){e.formID;var t=e.formFields,i=e.activeCampaingConf,s=e.setActiveCampaingConf;e.isLoading,e.setisLoading,e.setSnackbar;return(0,r.jsxs)(r.Fragment,{children:[(0,r.jsx)("br",{}),(0,r.jsx)("div",{className:"mt-4",children:(0,r.jsx)("b",{className:"wdt-100",children:(0,n.__)("Map Fields","bitform")})}),(0,r.jsx)("div",{className:"btcd-hr mt-1"}),(0,r.jsxs)("div",{className:"flx flx-around mt-2 mb-1",children:[(0,r.jsx)("div",{className:"txt-dp",children:(0,r.jsx)("b",{children:(0,n.__)("Form Fields","bitform")})}),(0,r.jsx)("div",{className:"txt-dp",children:(0,r.jsx)("b",{children:(0,n.__)("ActiveCampaign Fields","bitform")})})]}),i.field_map.map((function(e,n){return(0,r.jsx)(o,{i:n,field:e,activeCampaingConf:i,formFields:t,setActiveCampaingConf:s},"Activecampaign-m-"+(n+9))})),(0,r.jsx)("div",{className:"txt-center  mt-2",style:{marginRight:85},children:(0,r.jsx)("button",{onClick:function(){return(0,a.FP)(i.field_map.length,i,s)},className:"icn-btn sh-sm",type:"button",children:"+"})}),(0,r.jsx)("br",{}),(0,r.jsx)("br",{}),(0,r.jsx)("div",{className:"mt-4",children:(0,r.jsx)("b",{className:"wdt-100",children:(0,n.__)("Actions","bitform")})}),(0,r.jsx)("div",{className:"btcd-hr mt-1"}),(0,r.jsx)(c,{activeCampaingConf:i,setActiveCampaingConf:s})]})}},4771:function(e,t,i){"use strict";i.r(t);var n=i(2122),a=i(4866),s=i(7294),l=i(5977),r=i(5001),c=i(5813),d=i(4383),o=i(9134),u=i(3494),m=i(5893);t.default=function(e){var t=e.formFields,i=e.setIntegration,f=e.integrations,p=e.allIntegURL,v=(0,l.k6)(),h=(0,l.UO)(),b=h.id,x=h.formID,g=(0,s.useState)((0,n.Z)({},f[b])),_=g[0],j=g[1],C=(0,s.useState)(!1),N=C[0],F=C[1],y=(0,s.useState)({show:!1}),k=y[0],Z=y[1];return(0,m.jsxs)("div",{style:{width:900},children:[(0,m.jsx)(r.Z,{snack:k,setSnackbar:Z}),(0,m.jsxs)("div",{className:"flx mt-3",children:[(0,m.jsx)("b",{className:"wdt-150 d-in-b",children:(0,a.__)("Integration Name:","bitform")}),(0,m.jsx)("input",{className:"btcd-paper-inp w-7",onChange:function(e){return(0,o.Rx)(e,_,j)},name:"name",value:_.name,type:"text",placeholder:(0,a.__)("Integration Name...","bitform")})]}),(0,m.jsx)("br",{}),(0,m.jsx)("br",{}),(0,m.jsx)(u.Z,{formID:x,formFields:t,activeCampaingConf:_,setActiveCampaingConf:j,isLoading:N,setisLoading:F,setSnackbar:Z}),void 0,(0,m.jsx)(c.Z,{edit:!0,saveConfig:function(){return(0,d.Mm)(f,i,p,_,v,b,1)},disabled:_.field_map.length<1}),(0,m.jsx)("br",{})]})}},5813:function(e,t,i){"use strict";i.d(t,{Z:function(){return s}});var n=i(5637),a=i(5893);function s(e){var t=e.step,i=e.saveConfig,s=e.edit,l=e.disabled;return s?(0,a.jsx)("div",{className:"txt-center w-9 mt-3",children:(0,a.jsx)("button",{onClick:i,className:"btn btcd-btn-lg green sh-sm flx",type:"button",disabled:l,children:(0,n.__)("Save","bitform")})}):(0,a.jsxs)("div",{className:"btcd-stp-page txt-center",style:{width:3===t&&"90%",height:3===t&&"100%"},children:[(0,a.jsx)("h2",{className:"ml-3",children:(0,n.__)("Successfully Integrated","bitform")}),(0,a.jsxs)("button",{onClick:i,className:"btn btcd-btn-lg green sh-sm",type:"button",children:[(0,n.__)("Finish & Save ","bitform"),"✔"]})]})}},8530:function(e,t,i){"use strict";var n=i(5893);t.Z=function(e){var t=e.label,i=e.onChange,a=e.value,s=e.disabled,l=e.type,r=e.textarea,c=e.className;return(0,n.jsxs)("label",{className:"btcd-mt-inp "+c,children:[!r&&(0,n.jsx)("input",{type:void 0===l?"text":l,onChange:i,placeholder:" ",disabled:s,value:a}),r&&(0,n.jsx)("textarea",{type:void 0===l?"text":l,onChange:i,placeholder:" ",disabled:s,value:a}),(0,n.jsx)("span",{children:t})]})}}}]);