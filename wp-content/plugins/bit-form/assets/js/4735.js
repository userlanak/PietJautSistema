(self.webpackChunk_bitforms=self.webpackChunk_bitforms||[]).push([[4735],{4735:function(e,t,l){"use strict";l.d(t,{Z:function(){return k}});var i=l(2122),n=l(9756),s=l(7294),a=l(1298),r=l(6941),o=l(9521),d=l(2871),c=l(5637),u=l(3218),b=l(4401),h=l(5893);function f(e){var t=(0,s.useState)(!1),l=t[0],i=t[1],n=(0,s.useRef)(null),a=function(e){n.current&&!n.current.contains(e.target)&&i(!1)};(0,s.useEffect)((function(){return document.addEventListener("click",a,!0),function(){document.removeEventListener("click",a,!0)}}));return(0,h.jsxs)("div",{className:"btcd-menu",children:[(0,h.jsxs)("button",{ref:n,onClick:function(){i(!0)},className:"icn-btn btcd-icn-lg tooltip",style:{"--tooltip-txt":'"Column  Visibility"',"--tt-left":"148%"},"aria-label":"icon-btn",type:"button",children:[(0,h.jsx)("span",{className:"btcd-icn "+e.icn}),e.title]}),(0,h.jsx)("div",{}),(0,h.jsx)("div",{ref:n,className:"btcd-menu-li "+(l?"btcd-menu-a":""),children:e.children})]})}var p=l(3921),m=l(4561),x=function(){return(0,h.jsx)(m.ZP,{speed:.5,width:"100%",height:400,viewBox:"0 0 1520 400",backgroundColor:"#f7f7f7",foregroundColor:"#ecebeb",children:[0,1,2,3,4,5,6,7].map((function(e){return(0,h.jsxs)(s.Fragment,{children:[(0,h.jsx)("rect",{x:"12",y:10+60*e,rx:"4",ry:"4",width:"20",height:"20"}),(0,h.jsx)("rect",{x:"66",y:10+60*e,rx:"10",ry:"10",width:"85",height:"19"}),(0,h.jsx)("rect",{x:"187",y:10+60*e,rx:"10",ry:"10",width:"169",height:"19"}),(0,h.jsx)("rect",{x:"1182",y:10+60*e,rx:"10",ry:"10",width:"85",height:"19"}),(0,h.jsx)("rect",{x:"401",y:10+60*e,rx:"10",ry:"10",width:"85",height:"19"}),(0,h.jsx)("rect",{x:"522",y:10+60*e,rx:"10",ry:"10",width:"169",height:"19"}),(0,h.jsx)("rect",{x:"977",y:10+60*e,rx:"10",ry:"10",width:"169",height:"19"}),(0,h.jsx)("rect",{x:"730",y:10+60*e,rx:"10",ry:"10",width:"85",height:"19"}),(0,h.jsx)("rect",{x:"1304",y:10+60*e,rx:"10",ry:"10",width:"85",height:"19"}),(0,h.jsx)("rect",{x:"851",y:10+60*e,rx:"10",ry:"10",width:"85",height:"19"}),(0,h.jsx)("circle",{cx:"1456",cy:20+60*e,r:"12"})]},"plh-"+(e+9))}))})},g=l(8762),j=l(9492),y=l(5257),v=l(5001);function C(e){var t,l,n,a,r=e.showExportMdl,o=e.close,d=e.cols,u=e.formID,b=e.report,f=(0,s.useState)({show:!1}),p=f[0],m=f[1],x=(0,s.useState)(!1),C=x[0],N=x[1],w=(0,s.useState)({fileFormate:"csv",sort:"ASC",sortField:"bitforms_form_entry_id",limit:null,custom:"all",formId:u,selectedField:""}),_=w[0],S=w[1],F=b?null==(t=b[b.length-1])||null==(l=t.details)?void 0:l.order:["bf3-1-"],k=b?null==(n=b[b.length-1])||null==(a=n.details)?void 0:a.hiddenColumns:[],D=d.filter((function(e){return"#"!==e.Header&&"object"!==typeof e.Header})),Z=[],z=[];D.map((function(e,t){null!=F&&F.includes(e.accessor)&&(Z[t]={key:e.accessor,val:e.Header},z[t]=e.accessor)})),z=z.filter((function(e){return!k.includes(e)})),Z=Z.filter((function(e){return!k.includes(e.key)})),_.selectedField=JSON.stringify(z);var B=function(e,t){var l=(0,i.Z)({},_);l[e]="number"===typeof t?Number(t):t,S(l)};return(0,h.jsxs)("div",{children:[(0,h.jsx)(v.Z,{snack:p,setSnackbar:m}),(0,h.jsx)(g.Z,{md:!0,show:r,setModal:o,title:"Export Data",style:{overflow:"auto"},children:(0,h.jsxs)("div",{children:[(0,h.jsxs)("div",{className:"mt-3 flx",children:[(0,h.jsx)("b",{style:{width:200},children:(0,c.__)("How many rows to export","bitform")}),(0,h.jsxs)("select",{className:"btcd-paper-inp ml-2",name:"custom",style:{width:250},onChange:function(e){return B(e.target.name,e.target.value)},children:[(0,h.jsx)("option",{selected:!0,disabled:!0,children:"Choose option"}),(0,h.jsx)("option",{value:"all",children:"All"}),(0,h.jsx)("option",{value:"custom",children:"Custom"})]})]}),"custom"===_.custom&&(0,h.jsxs)("div",{className:"mt-3 flx",children:[(0,h.jsx)("b",{style:{width:200},children:(0,c.__)("Enter row number","bitform")}),(0,h.jsx)("input",{type:"text",style:{width:250},name:"limit",onChange:function(e){return B(e.target.name,e.target.value)},className:"btcd-paper-inp mt-2",placeholder:"Export Row Number"})]}),(0,h.jsxs)("div",{className:"mt-3 flx",children:[(0,h.jsx)("b",{style:{width:200},children:(0,c.__)("Sort Order","bitform")}),(0,h.jsxs)("select",{className:"btcd-paper-inp ml-2",name:"sort",style:{width:250},defaultValue:null==_?void 0:_.sort,onChange:function(e){return B(e.target.name,e.target.value)},children:[(0,h.jsx)("option",{value:"ASC",children:"Ascending"}),(0,h.jsx)("option",{value:"DESC",children:"Descending"})]})]}),(0,h.jsxs)("div",{className:"mt-3 flx",children:[(0,h.jsx)("b",{style:{width:200},children:(0,c.__)("Sort by","bitform")}),(0,h.jsxs)("select",{className:"btcd-paper-inp ml-2",name:"sortField",defaultValue:null==_?void 0:_.sortField,onChange:function(e){return B(e.target.name,e.target.value)},style:{width:250},children:[(0,h.jsx)("option",{value:"bitforms_form_entry_id",children:"ID"}),Z.map((function(e){return(0,h.jsx)("option",{value:e.key,children:e.val},e.key)}))]})]}),(0,h.jsxs)("div",{className:"mt-3 flx",children:[(0,h.jsx)("b",{style:{width:200},children:(0,c.__)("Export File Format","bitform")}),(0,h.jsxs)("select",{className:"btcd-paper-inp ml-2",name:"fileFormate",defaultValue:null==_?void 0:_.fileFormate,style:{width:250},onChange:function(e){return B(e.target.name,e.target.value)},children:[(0,h.jsx)("option",{value:"csv",children:"CSV"}),(0,h.jsx)("option",{value:"xlsx",children:"Xlsx"}),(0,h.jsx)("option",{value:"xls",children:"Xls"}),(0,h.jsx)("option",{value:"fods",children:"Fods"}),(0,h.jsx)("option",{value:"ods",children:"Ods"}),(0,h.jsx)("option",{value:"prn",children:"Prn"}),(0,h.jsx)("option",{value:"txt",children:"Text"}),(0,h.jsx)("option",{value:"html",children:"Html"}),(0,h.jsx)("option",{value:"eth",children:"Eth"})]})]}),(0,h.jsx)("div",{children:(0,h.jsxs)("button",{type:"button",onClick:function(e){return function(e){e.preventDefault(),N(!0),(0,j.Z)({data:_},"bitforms_filter_export_data").then((function(e){var t;if(void 0!==e&&e.success)if(0!==(null==(t=e.data)?void 0:t.count)){var l=[];l[0]="Entry ID",Z.map((function(e,t){l[t+1]=e.val}));var n=XLSX.utils.json_to_sheet(e.data),s=XLSX.utils.book_new();XLSX.utils.sheet_add_aoa(n,[l]),XLSX.utils.book_append_sheet(s,n),XLSX.writeFile(s,"bitform "+u+"."+(null==_?void 0:_.fileFormate))}else m((0,i.Z)({},{show:!0,msg:(0,c.__)("no response found","bitform")}));N(!1)}))}(e)},className:"btn btn-md blue btcd-mdl-btn",disabled:C,children:[(0,c.__)("Export","bitform"),C&&(0,h.jsx)(y.Z,{size:"20",clr:"#fff",className:"ml-2"})]})})]})})]})}function N(e){var t=e.formID,l=e.cols,i=e.report,n=(0,s.useState)(!1),a=(n[0],n[1],(0,s.useState)(!1)),r=a[0],o=a[1];return(0,h.jsxs)("div",{children:[(0,h.jsx)(C,{showExportMdl:r,close:o,formID:t,cols:l,report:i}),(0,h.jsx)("div",{className:"btcd-menu",children:(0,h.jsx)("button",{onClick:function(){o(!0)},className:"btn btcd-btn-o-blue ml-2 mt-0 mb-0",type:"button",children:"Export Data"})})]})}var w=(0,s.forwardRef)((function(e,t){var l=e.indeterminate,i=(0,n.Z)(e,["indeterminate"]),a=(0,s.useRef)(),r=t||a;return(0,s.useEffect)((function(){r.current.indeterminate=l}),[r,l]),(0,h.jsx)(p.Z,{refer:r,rest:i})}));function _(e){var t=e.globalFilter,l=e.setGlobalFilter,i=e.setSearch,n=e.exportImportMenu,a=e.data,r=e.cols,o=e.formID,d=e.report,u=(0,s.useState)(null),b=u[0],f=u[1];return(0,h.jsxs)("div",{className:"f-search",children:[(0,h.jsx)("button",{type:"button",className:"icn-btn","aria-label":"icon-btn",onClick:function(){i(t||void 0)},children:(0,h.jsx)("span",{className:"btcd-icn icn-search"})}),(0,h.jsx)("label",{children:(0,h.jsx)("input",{value:t||"",onChange:function(e){b&&clearTimeout(b);var t=e.target.value;l(t||void 0),f(setTimeout((function(){i(t||void 0)}),1e3))},placeholder:(0,c.__)("Search","bitform")})}),n&&(0,h.jsx)(N,{data:a,cols:r,formID:o,report:d})]})}function S(e){var t=e.cols,l=e.setCols,i=e.tableCol,n=e.tableAllCols;return(0,h.jsx)(f,{icn:"icn-remove_red_eye",children:(0,h.jsx)(a.$B,{autoHide:!0,style:{width:200},children:(0,h.jsx)(r._O,{list:t,setList:function(e){return l(e)},handle:".btcd-pane-drg",children:i.map((function(e,t){return(0,h.jsxs)("div",{className:"btcd-pane "+(("Actions"===e.Header||"object"===typeof e.Header)&&"d-non"),children:[(0,h.jsx)(p.Z,{cls:"scl-7",id:n[t+1].id,title:e.Header,rest:n[t+1].getToggleHiddenProps()}),(0,h.jsx)("span",{className:"btcd-pane-drg",children:"∷"})]},n[t+1].id)}))})})})}function F(e){var t=(0,s.useState)({show:!1,btnTxt:""}),l=t[0],n=t[1],r=e.columns,f=e.data,p=e.fetchData,m=e.report,g=(0,s.useContext)(u.l).reportsData,j=g.reportsDispatch,y=g.reports,v=(0,o.useTable)({debug:!0,fetchData:p,columns:r,data:f,manualPagination:"undefined"!==typeof e.pageCount,pageCount:e.pageCount,initialState:{pageIndex:0,hiddenColumns:!isNaN(m)&&y.length>0&&"details"in y[m]&&"object"===typeof y[m].details&&"hiddenColumns"in y[m].details?y[m].details.hiddenColumns:[],pageSize:!isNaN(m)&&y.length>0&&"details"in y[m]&&"object"===typeof y[m].details&&"pageSize"in y[m].details?y[m].details.pageSize:10,sortBy:!isNaN(m)&&y.length>0&&"details"in y[m]&&"object"===typeof y[m].details&&"sortBy"in y[m].details?y[m].details.sortBy:[],filters:!isNaN(m)&&y.length>0&&"details"in y[m]&&"object"===typeof y[m].details&&"filters"in y[m].details?y[m].details.filters:[],globalFilter:!isNaN(m)&&y.length>0&&"details"in y[m]&&"object"===typeof y[m].details&&"globalFilter"in y[m].details?y[m].details.globalFilter:"",columnOrder:!isNaN(m)&&y.length>0&&"details"in y[m]&&"object"===typeof y[m].details&&"order"in y[m].details?y[m].details.order:[]},autoResetPage:!1,autoResetHiddenColumns:!1,autoResetSortBy:!1,autoResetFilters:!1,autoResetGlobalFilter:!1},o.useFilters,o.useGlobalFilter,o.useSortBy,o.usePagination,d.useSticky,o.useColumnOrder,o.useFlexLayout,e.resizable?o.useResizeColumns:"",e.rowSeletable?o.useRowSelect:"",e.rowSeletable?function(e){e.allColumns.push((function(e){return[{id:"selection",width:50,maxWidth:50,minWidth:67,sticky:"left",Header:function(e){var t=e.getToggleAllRowsSelectedProps;return(0,h.jsx)(w,(0,i.Z)({},t()))},Cell:function(e){var t=e.row;return(0,h.jsx)(w,(0,i.Z)({},t.getToggleRowSelectedProps()))}}].concat(e)}))}:""),C=v.getTableProps,N=v.getTableBodyProps,F=v.headerGroups,k=v.prepareRow,D=v.page,Z=v.canPreviousPage,z=v.canNextPage,B=v.pageOptions,I=v.pageCount,P=v.gotoPage,R=v.nextPage,E=v.previousPage,T=v.setPageSize,H=v.state,A=v.preGlobalFilteredRows,X=v.selectedFlatRows,L=v.allColumns,G=v.setGlobalFilter,O=v.state,M=O.pageIndex,V=O.pageSize,W=O.sortBy,$=O.filters,J=O.globalFilter,K=O.hiddenColumns,Y=v.setColumnOrder,q=v.setHiddenColumns,Q=(0,s.useState)(parseInt(m,10)),U=Q[0],ee=Q[1],te=(0,s.useState)(!1),le=te[0],ie=te[1],ne=(0,s.useState)(J),se=ne[0],ae=ne[1];(0,s.useEffect)((function(){p&&p({pageIndex:M,pageSize:V,sortBy:W,filters:$,globalFilter:se})}),[p,M,V,W,$,se]),(0,s.useEffect)((function(){y[U]&&"object"===typeof y[U].details&&y[U].details&&"order"in y[U].details&&Y(y[U].details.order)}),[]),(0,s.useEffect)((function(){M>I&&P(0)}),[P,I,M]),(0,s.useEffect)((function(){var e;!isNaN(U)&&y.length>0&&y[U]&&"details"in y[U]?(e="object"===typeof y[U].details&&y[U].details?(0,i.Z)({},y[U].details,{hiddenColumns:K,pageSize:V,sortBy:W,filters:$,globalFilter:J}):{hiddenColumns:K,pageSize:V,sortBy:W,filters:$,globalFilter:J},j({type:"update",report:(0,i.Z)({},y[U],{details:e,type:"table"}),reportID:U}),ie(!1)):le&&ie(!1)}),[V,W,$,J,K]),(0,s.useEffect)((function(){"undefined"!==typeof e.pageCount&&0===H.columnOrder.length&&!isNaN(U)&&y.length>0&&null!==y[U]&&"object"===typeof y[U].details&&y[U].details&&(le||("hiddenColumns"in y[U].details&&y[U].details.hiddenColumns!==H.hiddenColumns&&q(y[U].details.hiddenColumns),"pageSize"in y[U].details&&y[U].details.pageSize!==V&&T(y[U].details.pageSize),"pageIndex"in y[U].details&&y[U].details.pageIndex!==M&&P(y[U].details.pageIndex-1),"sortBy"in y[U].details&&(y[U].details.sortBy,H.sortBy),"globalFilter"in y[U].details&&y[U].details.globalFilter!==H.globalFilter&&(G(y[U].details.globalFilter),ae(y[U].details.globalFilter)),"order"in y[U].details&&Y(y[U].details.order)))}),[y[m]]),(0,s.useEffect)((function(){if(r.length>0&&L.length>=r.length)if(!isNaN(U)&&y.length>0&&y[U]&&"details"in y[U])if(le&&y[U].details){var t;t=("object"===typeof y[U].details&&y[U].details,(0,i.Z)({},y[U].details,{order:["selection"].concat(r.map((function(e){return"id"in e?e.id:e.accessor}))),type:"table"}));var l=(0,i.Z)({},y[U],{details:t,type:"table"});0===H.columnOrder.length&&"object"===typeof y[U].details&&"order"in y[U].details?Y(y[U].details.order):(Y(t.order),j({type:"update",report:l,reportID:U}))}else!le&&"object"===typeof y[U].details&&y[U].details&&"order"in y[U].details?(Y(y[U].details.order),ie(!0)):le||ie(!0);else if("undefined"!==typeof e.pageCount&&(isNaN(U)||0===y.length)){var n={hiddenColumns:H.hiddenColumns,order:["selection"].concat(r.map((function(e){return"id"in e?e.id:e.accessor}))),pageSize:V,sortBy:H.sortBy,filters:H.filters,globalFilter:H.globalFilter};ee(y.length),j({type:"add",report:{details:n,type:"table"}})}}),[r]);var re=function(){l.show=!1,n((0,i.Z)({},l))};return(0,h.jsxs)(h.Fragment,{children:[(0,h.jsx)(b.Z,{show:l.show,body:l.body,action:l.action,close:re,btnTxt:l.btnTxt,btn2Txt:l.btn2Txt,btn2Action:l.btn2Action,btnClass:l.btnClass}),(0,h.jsx)("div",{className:"btcd-t-actions",children:(0,h.jsxs)("div",{className:"flx",children:[e.columnHidable&&(0,h.jsx)(S,{cols:e.columns,setCols:e.setTableCols,tableCol:r,tableAllCols:L}),e.rowSeletable&&X.length>0&&(0,h.jsxs)(h.Fragment,{children:["setBulkStatus"in e&&(0,h.jsx)("button",{onClick:function(){l.action=function(t){e.setBulkStatus(t,X),re()},l.btn2Action=function(t){e.setBulkStatus(t,X),re()},l.btnTxt=(0,c.__)("Disable","bitform"),l.btn2Txt=(0,c.__)("Enable","bitform"),l.body=(0,c.__)("Do you want to change these","bitform")+" "+X.length+" "+(0,c.__)("status","bitform")+" ?",l.show=!0,n((0,i.Z)({},l))},className:"icn-btn btcd-icn-lg tooltip",style:{"--tooltip-txt":'"Status"'},"aria-label":"icon-btn",type:"button",children:(0,h.jsx)("span",{className:"btcd-icn icn-toggle_off"})}),"duplicateData"in e&&(0,h.jsx)("button",{onClick:function(){l.action=function(){e.duplicateData(X,f,{fetchData:p,data:{pageIndex:M,pageSize:V,sortBy:W,filters:$,globalFilter:se}}),re()},l.btnTxt=(0,c.__)("Duplicate","bitform"),l.btn2Txt=null,l.btnClass="blue",l.body=(0,c.__)("Do You want Deplicate these","bitform")+" "+X.length+" "+(0,c.__)("item","bitform")+" ?",l.show=!0,n((0,i.Z)({},l))},className:"icn-btn btcd-icn-lg tooltip",style:{"--tooltip-txt":'"Duplicate"'},"aria-label":"icon-btn",type:"button",children:(0,h.jsx)("span",{className:"btcd-icn icn-file_copy",style:{fontSize:16}})}),(0,h.jsx)("button",{onClick:function(){l.action=function(){e.setBulkDelete(X,{fetchData:p,data:{pageIndex:M,pageSize:V,sortBy:W,filters:$,globalFilter:se}}),re()},l.btnTxt=(0,c.__)("Delete","bitform"),l.btn2Txt=null,l.btnClass="",l.body=(0,c.__)("Are you sure to delete these","bitform")+" "+X.length+" "+(0,c.__)("items","bitform")+" ?",l.show=!0,n((0,i.Z)({},l))},className:"icn-btn btcd-icn-lg tooltip",style:{"--tooltip-txt":'"Delete"'},"aria-label":"icon-btn",type:"button",children:(0,h.jsx)("span",{className:"btcd-icn icn-trash-fill",style:{fontSize:16}})}),(0,h.jsxs)("small",{className:"btcd-pill",children:[X.length," ",(0,c.__)("Row Selected","bitform")]})]})]})}),(0,h.jsxs)(h.Fragment,{children:[(0,h.jsx)(_,{preGlobalFilteredRows:A,globalFilter:H.globalFilter,setGlobalFilter:G,setSearch:ae,exportImportMenu:e.exportImportMenu,data:e.data,cols:e.columns,formID:e.formID,report:m}),(0,h.jsx)("div",{className:"mt-2",children:(0,h.jsx)(a.$B,{className:"btcd-scroll",style:{height:e.height},children:(0,h.jsxs)("div",(0,i.Z)({},C(),{className:e.className+" "+(e.rowClickable&&"rowClickable"),children:[(0,h.jsx)("div",{className:"thead",children:F.map((function(t,l){return(0,h.jsx)("div",(0,i.Z)({className:"tr"},t.getHeaderGroupProps(),{children:t.headers.map((function(t){return(0,h.jsxs)("div",(0,i.Z)({className:"th flx"},t.getHeaderProps(),{children:[(0,h.jsxs)("div",(0,i.Z)({},"t_action"!==t.id&&t.getSortByToggleProps(),{children:[t.render("Header")," ","t_action"!==t.id&&"selection"!==t.id&&(0,h.jsx)("span",{children:t.isSorted?t.isSortedDesc?String.fromCharCode(9662):String.fromCharCode(9652):(0,h.jsx)("span",{className:"btcd-icn icn-sort",style:{fontSize:10,marginLeft:5}})})]})),e.resizable&&(0,h.jsx)("div",(0,i.Z)({},t.getResizerProps(),{className:"btcd-t-resizer "+(t.isResizing?"isResizing":"")}))]}),t.id)}))}),"t-th-"+(l+8))}))}),e.loading?(0,h.jsx)(x,{}):(0,h.jsx)("div",(0,i.Z)({className:"tbody"},N(),{children:D.map((function(t){return k(t),(0,h.jsx)("div",(0,i.Z)({className:"tr "+(t.isSelected?"btcd-row-selected":"")},t.getRowProps(),{children:t.cells.map((function(l){return(0,h.jsx)("div",(0,i.Z)({className:"td flx"},l.getCellProps(),{onClick:function(i){return e.rowClickable&&"string"===typeof l.column.Header&&e.onRowClick(i,t.cells,l.row.index,{fetchData:p,data:{pageIndex:M,pageSize:V,sortBy:W,filters:$,globalFilter:J}})},onKeyPress:function(i){return e.rowClickable&&"string"===typeof l.column.Header&&e.onRowClick(i,t.cells,l.row.index,{fetchData:p,data:{pageIndex:M,pageSize:V,sortBy:W,filters:$,globalFilter:J}})},role:"button",tabIndex:0,"aria-label":"cell",children:l.render("Cell")}),"t-d-"+l.row.index)}))}),"t-r-"+t.index)}))}))]}))})})]}),(0,h.jsxs)("div",{className:"btcd-pagination",children:[(0,h.jsx)("small",{children:e.countEntries>=0&&(0,c.__)("Total Response:","bitform")+"\n            "+e.countEntries}),(0,h.jsxs)("div",{children:[(0,h.jsx)("button",{"aria-label":"Go first",className:"icn-btn",type:"button",onClick:function(){return P(0)},disabled:!Z,children:"«"})," ",(0,h.jsx)("button",{"aria-label":"Back",className:"icn-btn",type:"button",onClick:function(){return E()},disabled:!Z,children:"‹"})," ",(0,h.jsx)("button",{"aria-label":"Next",className:"icn-btn",type:"button",onClick:function(){return R()},disabled:!z,children:"›"})," ",(0,h.jsx)("button",{"aria-label":"Last",className:"icn-btn",type:"button",onClick:function(){return P(I-1)},disabled:!z,children:"»"})," ",(0,h.jsxs)("small",{children:[" ",(0,c.__)("Page","bitform")," ",(0,h.jsxs)("strong",{children:[M+1," ",(0,c.__)("of","bitform")," ",B.length," "," "]})," "]}),(0,h.jsx)("label",{children:(0,h.jsx)("select",{className:"btcd-paper-inp",value:V,onChange:function(t){T(Number(t.target.value)),e.getPageSize&&e.getPageSize(t.target.value,M)},children:[10,20,30,40,50].map((function(e){return(0,h.jsxs)("option",{value:e,children:[(0,c.__)("Show","bitform")," ",e]},e)}))})})]})]})]})}var k=(0,s.memo)(F)}}]);