(self.webpackChunk_bitforms=self.webpackChunk_bitforms||[]).push([[4117],{4117:function(e,t,s){"use strict";s.r(t);var n=s(2122),a=s(7294),i=s(5977),r=s(5637),o=s(5001),l=s(4383),d=s(5813),m=s(4097),f=s(7807),c=s(5893);t.default=function(e){var t=e.formFields,s=e.setIntegration,u=e.integrations,b=e.allIntegURL,h=(0,i.UO)(),p=h.id,x=h.formID,g=(0,i.k6)(),k=(0,a.useState)((0,n.Z)({},u[p])),_=k[0],w=k[1],j=(0,a.useState)(!1),v=j[0],I=j[1],C=(0,a.useState)({show:!1}),N=C[0],S=C[1];return(0,c.jsxs)("div",{style:{width:900},children:[(0,c.jsx)(o.Z,{snack:N,setSnackbar:S}),(0,c.jsxs)("div",{className:"flx mt-3",children:[(0,c.jsx)("b",{className:"wdt-100 d-in-b",children:(0,r.__)("Integration Name:","bitform")}),(0,c.jsx)("input",{className:"btcd-paper-inp w-7",onChange:function(e){return(0,m.Rx)(e,_,w)},name:"name",value:_.name,type:"text",placeholder:(0,r.__)("Integration Name...","bitform")})]}),(0,c.jsx)("br",{}),(0,c.jsx)("br",{}),(0,c.jsx)(f.Z,{formID:x,formFields:t,handleInput:function(e){return(0,m.Rx)(e,_,w,x,I,S)},deskConf:_,setDeskConf:w,isLoading:v,setisLoading:I,setSnackbar:S}),(0,c.jsx)(d.Z,{edit:!0,saveConfig:function(){var e;(0,m.Pd)(_)?null!=(e=_.actions)&&e.ticket_owner?(0,l.Mm)(u,s,b,_,g,p,1):S({show:!0,msg:(0,r.__)("Please select a ticket owner","bitform")}):S({show:!0,msg:(0,r.__)("Please map mandatory fields","bitform")})},disabled:""===_.department||""===_.table||_.field_map.length<1})]})}}}]);