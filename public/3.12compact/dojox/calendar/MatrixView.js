//>>built
require({cache:{"url:dojox/calendar/templates/MatrixView.html":'\x3cdiv data-dojo-attach-events\x3d"keydown:_onKeyDown"\x3e\n\t\x3cdiv  class\x3d"dojoxCalendarYearColumnHeader" data-dojo-attach-point\x3d"yearColumnHeader"\x3e\n\t\t\x3ctable\x3e\x3ctr\x3e\x3ctd\x3e\x3cspan data-dojo-attach-point\x3d"yearColumnHeaderContent"\x3e\x3c/span\x3e\x3c/td\x3e\x3c/tr\x3e\x3c/table\x3e\t\t\n\t\x3c/div\x3e\t\n\t\x3cdiv data-dojo-attach-point\x3d"columnHeader" class\x3d"dojoxCalendarColumnHeader"\x3e\n\t\t\x3ctable data-dojo-attach-point\x3d"columnHeaderTable" class\x3d"dojoxCalendarColumnHeaderTable" cellpadding\x3d"0" cellspacing\x3d"0"\x3e\x3c/table\x3e\n\t\x3c/div\x3e\t\t\n\t\x3cdiv dojoAttachPoint\x3d"rowHeader" class\x3d"dojoxCalendarRowHeader"\x3e\n\t\t\x3ctable data-dojo-attach-point\x3d"rowHeaderTable" class\x3d"dojoxCalendarRowHeaderTable" cellpadding\x3d"0" cellspacing\x3d"0"\x3e\x3c/table\x3e\n\t\x3c/div\x3e\t\n\t\x3cdiv dojoAttachPoint\x3d"grid" class\x3d"dojoxCalendarGrid"\x3e\n\t\t\x3ctable data-dojo-attach-point\x3d"gridTable" class\x3d"dojoxCalendarGridTable" cellpadding\x3d"0" cellspacing\x3d"0"\x3e\x3c/table\x3e\n\t\x3c/div\x3e\t\n\t\x3cdiv data-dojo-attach-point\x3d"itemContainer" class\x3d"dojoxCalendarContainer" data-dojo-attach-event\x3d"mousedown:_onGridMouseDown,mouseup:_onGridMouseUp,ondblclick:_onGridDoubleClick,touchstart:_onGridTouchStart,touchmove:_onGridTouchMove,touchend:_onGridTouchEnd"\x3e\n\t\t\x3ctable data-dojo-attach-point\x3d"itemContainerTable" class\x3d"dojoxCalendarContainerTable" cellpadding\x3d"0" cellspacing\x3d"0" style\x3d"width:100%"\x3e\x3c/table\x3e\n\t\x3c/div\x3e\t\n\x3c/div\x3e\n'}});
define("dojox/calendar/MatrixView","dojo/_base/declare dojo/_base/array dojo/_base/event dojo/_base/lang dojo/_base/sniff dojo/_base/fx dojo/_base/html dojo/on dojo/dom dojo/dom-class dojo/dom-style dojo/dom-geometry dojo/dom-construct dojo/query dojox/html/metrics dojo/i18n ./ViewBase dojo/text!./templates/MatrixView.html dijit/_TemplatedMixin".split(" "),function(E,J,F,r,y,B,C,z,K,l,n,w,t,v,L,D,G,H,I){return E("dojox.calendar.MatrixView",[G,I],{templateString:H,baseClass:"dojoxCalendarMatrixView",
_setTabIndexAttr:"domNode",viewKind:"matrix",renderData:null,startDate:null,refStartTime:null,refEndTime:null,columnCount:7,rowCount:5,horizontalRenderer:null,labelRenderer:null,expandRenderer:null,horizontalDecorationRenderer:null,percentOverlap:0,verticalGap:2,horizontalRendererHeight:17,labelRendererHeight:14,expandRendererHeight:15,cellPaddingTop:16,expandDuration:300,expandEasing:null,layoutDuringResize:!1,roundToDay:!0,showCellLabel:!0,scrollable:!1,resizeCursor:"e-resize",constructor:function(){this.invalidatingProperties=
"columnCount rowCount startDate horizontalRenderer horizontalDecaorationRenderer labelRenderer expandRenderer rowHeaderDatePattern columnHeaderLabelLength cellHeaderShortPattern cellHeaderLongPattern percentOverlap verticalGap horizontalRendererHeight labelRendererHeight expandRendererHeight cellPaddingTop roundToDay itemToRendererKindFunc layoutPriorityFunction formatItemTimeFunc textDir items".split(" ");this._ddRendererList=[];this._ddRendererPool=[];this._rowHeaderHandles=[]},destroy:function(a){this._cleanupRowHeader();
this.inherited(arguments)},postCreate:function(){this.inherited(arguments);this._initialized=!0;this.invalidRendering||this.refreshRendering()},_createRenderData:function(){var a={};a.dateLocaleModule=this.dateLocaleModule;a.dateClassObj=this.dateClassObj;a.dateModule=this.dateModule;a.dates=[];a.columnCount=this.get("columnCount");a.rowCount=this.get("rowCount");a.sheetHeight=this.itemContainer.offsetHeight;this._computeRowsHeight(a);var b=this.get("startDate");null==b&&(b=new a.dateClassObj);this.startDate=
b=this.floorToDay(b,!1,a);for(var c=0;c<a.rowCount;c++){a.dates.push([]);for(var d=0;d<a.columnCount;d++)a.dates[c].push(b),b=this.addAndFloor(b,"day",1)}a.startTime=this.newDate(a.dates[0][0],a);a.endTime=this.newDate(a.dates[a.rowCount-1][a.columnCount-1],a);a.endTime=a.dateModule.add(a.endTime,"day",1);a.endTime=this.floorToDay(a.endTime,!0);this.displayedItemsInvalidated&&!this._isEditing?(this.displayedItemsInvalidated=!1,this._computeVisibleItems(a)):this.renderData&&(a.items=this.renderData.items);
this.displayedDecorationItemsInvalidated?a.decorationItems=this.decorationStoreManager._computeVisibleItems(a):this.renderData&&(a.decorationItems=this.renderData.decorationItems);a.rtl=!this.isLeftToRight();return a},_validateProperties:function(){this.inherited(arguments);if(1>this.columnCount||isNaN(this.columnCount))this.columnCount=1;if(1>this.rowCount||isNaN(this.rowCount))this.rowCount=1;if(isNaN(this.percentOverlap)||0>this.percentOverlap||100<this.percentOverlap)this.percentOverlap=0;if(isNaN(this.verticalGap)||
0>this.verticalGap)this.verticalGap=2;if(isNaN(this.horizontalRendererHeight)||1>this.horizontalRendererHeight)this.horizontalRendererHeight=17;if(isNaN(this.labelRendererHeight)||1>this.labelRendererHeight)this.labelRendererHeight=14;if(isNaN(this.expandRendererHeight)||1>this.expandRendererHeight)this.expandRendererHeight=15},_setStartDateAttr:function(a){this.displayedItemsInvalidated=!0;this._set("startDate",a)},_setColumnCountAttr:function(a){this.displayedItemsInvalidated=!0;this._set("columnCount",
a)},_setRowCountAttr:function(a){this.displayedItemsInvalidated=!0;this._set("rowCount",a)},__fixEvt:function(a){a.sheet="primary";a.source=this;return a},_formatRowHeaderLabel:function(a){return this.rowHeaderDatePattern?this.renderData.dateLocaleModule.format(a,{selector:"date",datePattern:this.rowHeaderDatePattern}):this.getWeekNumberLabel(a)},_formatColumnHeaderLabel:function(a){return this.renderData.dateLocaleModule.getNames("days",this.columnHeaderLabelLength?this.columnHeaderLabelLength:"wide",
"standAlone")[a.getDay()]},cellHeaderShortPattern:null,cellHeaderLongPattern:null,_formatGridCellLabel:function(a,b,c){0==b&&0==c||1==a.getDate()?this.cellHeaderLongPattern?b=this.cellHeaderLongPattern:(b=D.getLocalization("dojo.cldr",this._calendar),b=b["dateFormatItem-MMMd"]):this.cellHeaderShortPattern?b=this.cellHeaderShortPattern:(b=D.getLocalization("dojo.cldr",this._calendar),b=b["dateFormatItem-d"]);return this.renderData.dateLocaleModule.format(a,{selector:"date",datePattern:b})},refreshRendering:function(){this.inherited(arguments);
if(this.domNode){this._validateProperties();var a=this.renderData,b=this.renderData=this._createRenderData();this._createRendering(b,a);this._layoutDecorationRenderers(b);this._layoutRenderers(b)}},_createRendering:function(a,b){if(0>=a.rowHeight)a.columnCount=1,a.rowCount=1,a.invalidRowHeight=!0;else{if(b&&this.itemContainerTable){var c=v(".dojoxCalendarItemContainerRow",this.itemContainerTable);b.rowCount=c.length}this._buildColumnHeader(a,b);this._buildRowHeader(a,b);this._buildGrid(a,b);this._buildItemContainer(a,
b);this.buttonContainer&&(null!=this.owner&&this.owner.currentView==this)&&n.set(this.buttonContainer,{right:0,left:0})}},_buildColumnHeader:function(a,b){var c=this.columnHeaderTable;if(c){var d=a.columnCount-(b?b.columnCount:0);8==y("ie")&&(null==this._colTableSave?this._colTableSave=r.clone(c):0>d&&(this.columnHeader.removeChild(c),t.destroy(c),this.columnHeaderTable=c=r.clone(this._colTableSave),this.columnHeader.appendChild(c),d=a.columnCount));var f=v("tbody",c),e=v("tr",c),f=1==f.length?f[0]:
C.create("tbody",null,c),e=1==e.length?e[0]:t.create("tr",null,f);if(0<d)for(f=0;f<d;f++)t.create("td",null,e);else{d=-d;for(f=0;f<d;f++)e.removeChild(e.lastChild)}v("td",c).forEach(function(b,c){b.className="";var d=a.dates[0][c];this._setText(b,this._formatColumnHeaderLabel(d));0==c?l.add(b,"first-child"):c==this.renderData.columnCount-1&&l.add(b,"last-child");this.styleColumnHeaderCell(b,d,a)},this);this.yearColumnHeaderContent&&this._setText(this.yearColumnHeaderContent,a.dateLocaleModule.format(a.dates[0][0],
{selector:"date",datePattern:"yyyy"}))}},styleColumnHeaderCell:function(a,b,c){l.add(a,this._cssDays[b.getDay()]);this.isWeekEnd(b)&&l.add(a,"dojoxCalendarWeekend")},_rowHeaderHandles:null,_cleanupRowHeader:function(){for(;0<this._rowHeaderHandles.length;)for(var a=this._rowHeaderHandles.pop();0<a.length;)a.pop().remove()},_rowHeaderClick:function(a){var b=v("td",this.rowHeaderTable).indexOf(a.currentTarget);this._onRowHeaderClick({index:b,date:this.renderData.dates[b][0],triggerEvent:a})},_buildRowHeader:function(a,
b){var c=this.rowHeaderTable;if(c){var d=v("tbody",c),f,d=1==d.length?d[0]:t.create("tbody",null,c),e=a.rowCount-(b?b.rowCount:0);if(0<e)for(var g=0;g<e;g++){f=t.create("tr",null,d);f=t.create("td",null,f);var h=[];h.push(z(f,"click",r.hitch(this,this._rowHeaderClick)));y("touch")||(h.push(z(f,"mousedown",function(a){l.add(a.currentTarget,"Active")})),h.push(z(f,"mouseup",function(a){l.remove(a.currentTarget,"Active")})),h.push(z(f,"mouseover",function(a){l.add(a.currentTarget,"Hover")})),h.push(z(f,
"mouseout",function(a){l.remove(a.currentTarget,"Hover")})));this._rowHeaderHandles.push(h)}else{e=-e;for(g=0;g<e;g++){d.removeChild(d.lastChild);for(f=this._rowHeaderHandles.pop();0<f.length;)f.pop().remove()}}v("tr",c).forEach(function(b,c){n.set(b,"height",this._getRowHeight(c)+"px");var d=a.dates[c][0],e=v("td",b)[0];e.className="";0==c&&l.add(e,"first-child");c==this.renderData.rowCount-1&&l.add(e,"last-child");this.styleRowHeaderCell(e,d,a);this._setText(e,this._formatRowHeaderLabel(d))},this)}},
styleRowHeaderCell:function(a,b,c){},_buildGrid:function(a,b){var c=this.gridTable;if(c){var d=v("tr",c),f=a.rowCount-d.length,e=0<f,g=a.columnCount-(d?v("td",d[0]).length:0);8==y("ie")&&(null==this._gridTableSave?this._gridTableSave=r.clone(c):0>g&&(this.grid.removeChild(c),t.destroy(c),this.gridTable=c=r.clone(this._gridTableSave),this.grid.appendChild(c),g=a.columnCount,f=a.rowCount,e=!0));d=v("tbody",c);d=1==d.length?d[0]:t.create("tbody",null,c);if(e)for(var h=0;h<f;h++)t.create("tr",null,d);
else{f=-f;for(h=0;h<f;h++)d.removeChild(d.lastChild)}var p=a.rowCount-f,m=e||0<g,g=m?g:-g;v("tr",c).forEach(function(b,c){if(m){var d=c>=p?a.columnCount:g;for(c=0;c<d;c++){var e=t.create("td",null,b);t.create("span",null,e)}}else for(c=0;c<g;c++)b.removeChild(b.lastChild)});v("tr",c).forEach(function(b,c){n.set(b,"height",this._getRowHeight(c)+"px");b.className="";0==c&&l.add(b,"first-child");c==a.rowCount-1&&l.add(b,"last-child");v("td",b).forEach(function(b,d){b.className="";0==d&&l.add(b,"first-child");
d==a.columnCount-1&&l.add(b,"last-child");var e=a.dates[c][d],f=v("span",b)[0];this._setText(f,this.showCellLabel?this._formatGridCellLabel(e,c,d):null);this.styleGridCell(b,e,a)},this)},this)}},styleGridCellFunc:null,defaultStyleGridCell:function(a,b,c){l.add(a,this._cssDays[b.getDay()]);c=this.dateModule;this.isToday(b)?l.add(a,"dojoxCalendarToday"):null!=this.refStartTime&&null!=this.refEndTime&&(0<=c.compare(b,this.refEndTime)||0>=c.compare(c.add(b,"day",1),this.refStartTime))?l.add(a,"dojoxCalendarDayDisabled"):
this.isWeekEnd(b)&&l.add(a,"dojoxCalendarWeekend")},styleGridCell:function(a,b,c){this.styleGridCellFunc?this.styleGridCellFunc(a,b,c):this.defaultStyleGridCell(a,b,c)},_buildItemContainer:function(a,b){var c=this.itemContainerTable;if(c){var d=[],f=a.rowCount-(b?b.rowCount:0);8==y("ie")&&(null==this._itemTableSave?this._itemTableSave=r.clone(c):0>f&&(this.itemContainer.removeChild(c),this._recycleItemRenderers(!0),this._recycleExpandRenderers(!0),t.destroy(c),this.itemContainerTable=c=r.clone(this._itemTableSave),
this.itemContainer.appendChild(c),f=a.columnCount));var e=v("tbody",c),g,e=1==e.length?e[0]:t.create("tbody",null,c);if(0<f)for(var h=0;h<f;h++)g=t.create("tr",null,e),l.add(g,"dojoxCalendarItemContainerRow"),g=t.create("td",null,g),g=t.create("div",null,g),l.add(g,"dojoxCalendarContainerRow");else{f=-f;for(h=0;h<f;h++)e.removeChild(e.lastChild)}v(".dojoxCalendarItemContainerRow",c).forEach(function(a,b){n.set(a,"height",this._getRowHeight(b)+"px");d.push(a.childNodes[0].childNodes[0])},this);a.cells=
d}},resize:function(a){this.inherited(arguments);this._resizeHandler(null,!1)},_resizeHandler:function(a,b){var c=this.renderData;if(null==c)this.refreshRendering();else{if(c.sheetHeight!=this.itemContainer.offsetHeight&&(c.sheetHeight=this.itemContainer.offsetHeight,-1==this.getExpandedRowIndex()?(this._computeRowsHeight(),this._resizeRows()):this.expandRow(c.expandedRow,c.expandedRowCol,0,null,!0),c.invalidRowHeight)){delete c.invalidRowHeight;this.renderData=null;this.displayedItemsInvalidated=
!0;this.refreshRendering();return}this.layoutDuringResize||b?setTimeout(r.hitch(this,function(){this._layoutRenderers(this.renderData);this._layoutDecorationRenderers(this.renderData)}),20):(n.set(this.itemContainer,"opacity",0),this._recycleItemRenderers(),this._recycleExpandRenderers(),void 0!=this._resizeTimer&&clearTimeout(this._resizeTimer),this._resizeTimer=setTimeout(r.hitch(this,function(){delete this._resizeTimer;this._resizeRowsImpl(this.itemContainer,"tr");this._layoutRenderers(this.renderData);
this._layoutDecorationRenderers(this.renderData);0==this.resizeAnimationDuration?n.set(this.itemContainer,"opacity",1):B.fadeIn({node:this.itemContainer,curve:[0,1]}).play(this.resizeAnimationDuration)}),200))}},resizeAnimationDuration:0,getExpandedRowIndex:function(){return null==this.renderData.expandedRow?-1:this.renderData.expandedRow},collapseRow:function(a,b,c){var d=this.renderData;void 0==c&&(c=!0);void 0==a&&(a=this.expandDuration);if(d&&null!=d.expandedRow&&-1!=d.expandedRow)if(c&&a){c=
d.expandedRow;var f=d.expandedRowHeight;delete d.expandedRow;this._computeRowsHeight(d);var e=this._getRowHeight(c);d.expandedRow=c;this._recycleExpandRenderers();this._recycleItemRenderers();n.set(this.itemContainer,"display","none");this._expandAnimation=new B.Animation({curve:[f,e],duration:a,easing:b,onAnimate:r.hitch(this,function(a){this._expandRowImpl(Math.floor(a))}),onEnd:r.hitch(this,function(a){this._expandAnimation=null;this._collapseRowImpl(!1);this._resizeRows();n.set(this.itemContainer,
"display","block");setTimeout(r.hitch(this,function(){this._layoutRenderers(d)}),100);this.onExpandAnimationEnd(!1)})});this._expandAnimation.play()}else this._collapseRowImpl(c)},_collapseRowImpl:function(a){var b=this.renderData;delete b.expandedRow;delete b.expandedRowHeight;this._computeRowsHeight(b);if(void 0==a||a)this._resizeRows(),this._layoutRenderers(b)},expandRow:function(a,b,c,d,f){var e=this.renderData;if(!e||0>a||a>=e.rowCount)return-1;if(void 0==b||0>b||b>=e.columnCount)b=-1;void 0==
f&&(f=!0);void 0==c&&(c=this.expandDuration);void 0==d&&(d=this.expandEasing);var g=this._getRowHeight(a),h=e.sheetHeight-Math.ceil(this.cellPaddingTop*(e.rowCount-1));e.expandedRow=a;e.expandedRowCol=b;e.expandedRowHeight=h;f&&(c?(this._recycleExpandRenderers(),this._recycleItemRenderers(),n.set(this.itemContainer,"display","none"),this._expandAnimation=new B.Animation({curve:[g,h],duration:c,delay:50,easing:d,onAnimate:r.hitch(this,function(a){this._expandRowImpl(Math.floor(a))}),onEnd:r.hitch(this,
function(){this._expandAnimation=null;n.set(this.itemContainer,"display","block");setTimeout(r.hitch(this,function(){this._expandRowImpl(h,!0)}),100);this.onExpandAnimationEnd(!0)})}),this._expandAnimation.play()):this._expandRowImpl(h,!0))},_expandRowImpl:function(a,b){var c=this.renderData;c.expandedRowHeight=a;this._computeRowsHeight(c,c.sheetHeight-a);this._resizeRows();b&&this._layoutRenderers(c)},onExpandAnimationEnd:function(a){},_resizeRows:function(){0>=this._getRowHeight(0)||(this.rowHeaderTable&&
this._resizeRowsImpl(this.rowHeaderTable,"tr"),this.gridTable&&this._resizeRowsImpl(this.gridTable,"tr"),this.itemContainerTable&&this._resizeRowsImpl(this.itemContainerTable,"tr"))},_computeRowsHeight:function(a,b){var c=null==a?this.renderData:a;b=b||c.sheetHeight;b--;7==y("ie")&&(b-=c.rowCount);if(1==c.rowCount)c.rowHeight=b,c.rowHeightFirst=b,c.rowHeightLast=b;else{var d=null==c.expandedRow?c.rowCount:c.rowCount-1,f=b/d,e;e=b-Math.floor(f)*d;var g=Math.abs(b-Math.ceil(f)*d),d=1;e<g?(f=Math.floor(f),
g=e):(d=-1,f=Math.ceil(f));e=f+d*Math.floor(g/2);c.rowHeight=f;c.rowHeightFirst=e;c.rowHeightLast=e+d*(g%2)}},_getRowHeight:function(a){var b=this.renderData;return a==b.expandedRow?b.expandedRowHeight:0==b.expandedRow&&1==a||0==a?b.rowHeightFirst:b.expandedRow==this.renderData.rowCount-1&&a==this.renderData.rowCount-2||a==this.renderData.rowCount-1?b.rowHeightLast:b.rowHeight},_resizeRowsImpl:function(a,b){dojo.query(b,a).forEach(function(a,b){n.set(a,"height",this._getRowHeight(b)+"px")},this)},
_setHorizontalRendererAttr:function(a){this._destroyRenderersByKind("horizontal");this._set("horizontalRenderer",a)},_setLabelRendererAttr:function(a){this._destroyRenderersByKind("label");this._set("labelRenderer",a)},_destroyExpandRenderer:function(a){a.destroyRecursive&&a.destroyRecursive();C.destroy(a.domNode)},_setExpandRendererAttr:function(a){for(;0<this._ddRendererList.length;)this._destroyExpandRenderer(this._ddRendererList.pop());var b=this._ddRendererPool;if(b)for(;0<b.length;)this._destroyExpandRenderer(b.pop());
this._set("expandRenderer",a)},_ddRendererList:null,_ddRendererPool:null,_getExpandRenderer:function(a,b,c,d,f){if(null==this.expandRenderer)return null;var e=this._ddRendererPool.pop();null==e&&(e=new this.expandRenderer);this._ddRendererList.push(e);e.set("owner",this);e.set("date",a);e.set("items",b);e.set("rowIndex",c);e.set("columnIndex",d);e.set("expanded",f);return e},_recycleExpandRenderers:function(a){for(var b=0;b<this._ddRendererList.length;b++){var c=this._ddRendererList[b];c.set("Up",
!1);c.set("Down",!1);a&&c.domNode.parentNode.removeChild(c.domNode);n.set(c.domNode,"display","none")}this._ddRendererPool=this._ddRendererPool.concat(this._ddRendererList);this._ddRendererList=[]},_defaultItemToRendererKindFunc:function(a){return 1440<=Math.abs(this.renderData.dateModule.difference(a.startTime,a.endTime,"minute"))?"horizontal":"label"},naturalRowsHeight:null,_roundItemToDay:function(a){var b=a.startTime;a=a.endTime;this.isStartOfDay(b)||(b=this.floorToDay(b,!1,this.renderData));
this.isStartOfDay(a)||(a=this.renderData.dateModule.add(a,"day",1),a=this.floorToDay(a,!0));return{startTime:b,endTime:a}},_sortItemsFunction:function(a,b){this.roundToDay&&(a=this._roundItemToDay(a),b=this._roundItemToDay(b));var c=this.dateModule.compare(a.startTime,b.startTime);0==c&&(c=-1*this.dateModule.compare(a.endTime,b.endTime));return c},_overlapLayoutPass3:function(a){for(var b=0,c=0,d=[],f=w.position(this.gridTable).x,e=0;e<this.renderData.columnCount;e++){for(var g=!1,c=w.position(this._getCellAt(0,
e)),b=c.x-f,c=b+c.w,h=a.length-1;0<=h&&!g;h--)for(var p=0;p<a[h].length;p++)if(g=a[h][p],g=g.start<c&&b<g.end){d[e]=h+1;break}g||(d[e]=0)}return d},applyRendererZIndex:function(a,b,c,d,f,e){n.set(b.container,{zIndex:f||d?b.renderer.mobile?100:0:void 0==a.lane?1:a.lane+1})},_layoutDecorationRenderers:function(a){null==a||(null==a.decorationItems||0>=a.rowHeight)||(!this.gridTable||null!=this._expandAnimation||null==this.horizontalDecorationRenderer?this.decorationRendererManager.recycleItemRenderers():
(this._layoutStep=a.columnCount,this.renderData.gridTablePosX=w.position(this.gridTable).x,this.inherited(arguments)))},_layoutRenderers:function(a){null==a||(null==a.items||0>=a.rowHeight)||(!this.gridTable||null!=this._expandAnimation||null==this.horizontalRenderer&&null==this.labelRenderer?this._recycleItemRenderers():(this.renderData.gridTablePosX=w.position(this.gridTable).x,this._layoutStep=a.columnCount,this._recycleExpandRenderers(),this._hiddenItems=[],this._offsets=[],this.naturalRowsHeight=
[],this.inherited(arguments)))},_offsets:null,_layoutInterval:function(a,b,c,d,f,e){if(null!=this.renderData.cells)if("dataItems"===e){var g=[];a=[];for(var h=0;h<f.length;h++){var p=f[h],m=this._itemToRendererKind(p);"horizontal"==m?g.push(p):"label"==m&&a.push(p)}f=this.getExpandedRowIndex();if(!(-1!=f&&f!=b)){f=[];h=null;p=[];if(0<g.length&&this.horizontalRenderer)var h=this._createHorizontalLayoutItems(b,c,d,g,e),k=this._computeHorizontalOverlapLayout(h,p);var x,g=[];0<a.length&&this.labelRenderer&&
(x=this._createLabelLayoutItems(b,c,d,a),this._computeLabelOffsets(x,g));c=this._computeColHasHiddenItems(b,p,g);null!=h&&this._layoutHorizontalItemsImpl(b,h,k,c,f,e);null!=x&&this._layoutLabelItemsImpl(b,x,c,f,p,e);this._layoutExpandRenderers(b,c,f);this._hiddenItems[b]=f}}else this.horizontalDecorationRenderer&&(h=this._createHorizontalLayoutItems(b,c,d,f,e),null!=h&&this._layoutHorizontalItemsImpl(b,h,null,!1,null,e))},_createHorizontalLayoutItems:function(a,b,c,d,f){var e=this.renderData,g=e.dateModule,
h=e.rtl?-1:1,p=[];f="decorationItems"===f;for(var m=0;m<d.length;m++){var k=d[m],x=this.computeRangeOverlap(e,k.startTime,k.endTime,b,c),q=g.difference(b,this.floorToDay(x[0],!1,e),"day"),l=e.dates[a][q],s=w.position(this._getCellAt(a,q,!1)),n=s.x-e.gridTablePosX;e.rtl&&(n+=s.w);if(f&&!k.isAllDay||!f&&!this.roundToDay&&!k.allDay)n+=h*this.computeProjectionOnDate(e,l,x[0],s.w);var n=Math.ceil(n),t=g.difference(b,this.floorToDay(x[1],!1,e),"day"),u;t>e.columnCount-1?(s=w.position(this._getCellAt(a,
e.columnCount-1,!1)),u=e.rtl?s.x-e.gridTablePosX:s.x-e.gridTablePosX+s.w):(l=e.dates[a][t],s=w.position(this._getCellAt(a,t,!1)),u=s.x-e.gridTablePosX,e.rtl&&(u+=s.w),!f&&this.roundToDay?this.isStartOfDay(x[1])||(u+=h*s.w):u+=h*this.computeProjectionOnDate(e,l,x[1],s.w));u=Math.floor(u);e.rtl&&(l=u,u=n,n=l);u>n&&(k=r.mixin({start:n,end:u,range:x,item:k,startOffset:q,endOffset:t},k),p.push(k))}return p},_computeHorizontalOverlapLayout:function(a,b){for(var c=this.renderData,d=this.horizontalRendererHeight,
f=this.computeOverlapping(a,this._overlapLayoutPass3),e=this.percentOverlap/100,g=0;g<c.columnCount;g++){var h=f.addedPassRes[g],p=c.rtl?c.columnCount-g-1:g;b[p]=0==e?0==h?0:1==h?d:d+(h-1)*(d+this.verticalGap):0==h?0:h*d-(h-1)*e*d+this.verticalGap;b[p]+=this.cellPaddingTop}return f},_createLabelLayoutItems:function(a,b,c,d){if(null!=this.labelRenderer){for(var f=this.renderData,e=f.dateModule,g=[],h=0;h<d.length;h++){var p=d[h];a=this.floorToDay(p.startTime,!1,f);for(var m=this.dateModule.compare;-1==
m(a,p.endTime)&&-1==m(a,c);){var k=e.add(a,"day",1),k=this.floorToDay(k,!0),k=this.computeRangeOverlap(f,p.startTime,p.endTime,a,k),n=e.difference(b,this.floorToDay(k[0],!1,f),"day");if(n>=this.columnCount)break;if(0<=n){var q=g[n];null==q&&(q=[],g[n]=q);q.push(r.mixin({startOffset:n,range:k,item:p},p))}a=e.add(a,"day",1);this.floorToDay(a,!0)}}return g}},_computeLabelOffsets:function(a,b){for(var c=0;c<this.renderData.columnCount;c++)b[c]=null==a[c]?0:a[c].length*(this.labelRendererHeight+this.verticalGap)},
_computeColHasHiddenItems:function(a,b,c){for(var d=[],f=this._getRowHeight(a),e,g=0,h=0;h<this.renderData.columnCount;h++)e=null==b||null==b[h]?this.cellPaddingTop:b[h],e+=null==c||null==c[h]?0:c[h],e>g&&(g=e),d[h]=e>f;this.naturalRowsHeight[a]=g;return d},_layoutHorizontalItemsImpl:function(a,b,c,d,f,e){c=this.renderData.cells[a];a=this._getRowHeight(a);for(var g=this.horizontalRendererHeight,h=this.percentOverlap/100,p=0;p<b.length;p++){var m=b[p],k=m.lane;if("dataItems"===e){var l=this.cellPaddingTop,
l=0==h?l+k*(g+this.verticalGap):l+k*(g-h*g),k=!1,q=a;if(this.expandRenderer){for(q=m.startOffset;q<=m.endOffset;q++)if(d[q]){k=!0;break}q=k?a-this.expandRendererHeight:a}if(l+g<=q){var k=this._createRenderer(m,"horizontal",this.horizontalRenderer,"dojoxCalendarHorizontal"),r=(q=this.isItemBeingEdited(m)&&!this.liveLayout&&this._isEditing)?a-this.cellPaddingTop:g,s=m.end-m.start;9<=y("ie")&&m.start+s<this.itemContainer.offsetWidth&&s++;n.set(k.container,{top:(q?this.cellPaddingTop:l)+"px",left:m.start+
"px",width:s+"px",height:r+"px"});this._applyRendererLayout(m,k,c,s,r,"horizontal")}else for(l=m.startOffset;l<m.endOffset;l++)null==f[l]?f[l]=[m.item]:f[l].push(m.item)}else k=this.decorationRendererManager.createRenderer(m,"horizontal",this.horizontalDecorationRenderer,"dojoxCalendarDecoration"),r=a,s=m.end-m.start,9<=y("ie")&&m.start+s<this.itemContainer.offsetWidth&&s++,n.set(k.container,{top:"0",left:m.start+"px",width:s+"px",height:r+"px"}),t.place(k.container,c),n.set(k.container,"display",
"block")}},_layoutLabelItemsImpl:function(a,b,c,d,f){for(var e,g,h=this.renderData,l=h.cells[a],m=this._getRowHeight(a),k=this.labelRendererHeight,t=w.getMarginBox(this.itemContainer).w,q=0;q<b.length;q++)if(e=b[q],null!=e){e.sort(r.hitch(this,function(a,b){return this.dateModule.compare(a.range[0],b.range[0])}));var v=this.expandRenderer?c[q]?m-this.expandRendererHeight:m:m;g=null==f||null==f[q]?this.cellPaddingTop:f[q]+this.verticalGap;for(var s=w.position(this._getCellAt(a,q)),y=s.x-h.gridTablePosX,
A=0;A<e.length;A++){if(g+k+this.verticalGap<=v){var u=e[A];r.mixin(u,{start:y,end:y+s.w});var z=this._createRenderer(u,"label",this.labelRenderer,"dojoxCalendarLabel"),B=this.isItemBeingEdited(u)&&!this.liveLayout&&this._isEditing,C=B?this._getRowHeight(a)-this.cellPaddingTop:k;h.rtl&&(u.start=t-u.end,u.end=u.start+s.w);n.set(z.container,{top:(B?this.cellPaddingTop:g)+"px",left:u.start+"px",width:s.w+"px",height:C+"px"});this._applyRendererLayout(u,z,l,s.w,C,"label")}else break;g+=k+this.verticalGap}for(;A<
e.length;A++)null==d[q]?d[q]=[e[A]]:d[q].push(e[A])}},_applyRendererLayout:function(a,b,c,d,f,e){var g=this.isItemBeingEdited(a),h=this.isItemSelected(a),l=this.isItemHovered(a),m=this.isItemFocused(a),k=b.renderer;k.set("hovered",l);k.set("selected",h);k.set("edited",g);k.set("focused",this.showFocus?m:!1);k.set("moveEnabled",this.isItemMoveEnabled(a._item,e));k.set("storeState",this.getItemStoreState(a));"label"!=e&&k.set("resizeEnabled",this.isItemResizeEnabled(a,e));this.applyRendererZIndex(a,
b,l,h,g,m);k.updateRendering&&k.updateRendering(d,f);t.place(b.container,c);n.set(b.container,"display","block")},_getCellAt:function(a,b,c){if((void 0==c||!0==c)&&!this.isLeftToRight())b=this.renderData.columnCount-1-b;return this.gridTable.childNodes[0].childNodes[a].childNodes[b]},_layoutExpandRenderers:function(a,b,c){if(this.expandRenderer){var d=this.renderData;if(d.expandedRow==a)null!=d.expandedRowCol&&-1!=d.expandedRowCol&&this._layoutExpandRendererImpl(d.expandedRow,d.expandedRowCol,null,
!0);else if(null==d.expandedRow)for(var f=0;f<d.columnCount;f++)b[f]&&this._layoutExpandRendererImpl(a,d.rtl?d.columnCount-1-f:f,c[f],!1)}},_layoutExpandRendererImpl:function(a,b,c,d){var f=this.renderData,e=r.clone(f.dates[a][b]),g=null,h=f.cells[a],g=this._getExpandRenderer(e,c,a,b,d);a=w.position(this._getCellAt(a,b));a.x-=f.gridTablePosX;this.layoutExpandRenderer(g,e,c,a,this.expandRendererHeight);t.place(g.domNode,h);n.set(g.domNode,"display","block")},layoutExpandRenderer:function(a,b,c,d,f){n.set(a.domNode,
{left:d.x+"px",width:d.w+"px",height:f+"px",top:d.h-f-1+"px"})},_onItemEditBeginGesture:function(a){var b=this._edProps,c=b.editedItem,d=a.dates,f=this.newDate("resizeEnd"==b.editKind?c.endTime:c.startTime);if("label"!=b.rendererKind&&"move"==a.editKind&&(c.allDay||this.roundToDay))b.dayOffset=this.renderData.dateModule.difference(this.floorToDay(d[0],!1,this.renderData),f,"day");this.inherited(arguments)},_computeItemEditingTimes:function(a,b,c,d,f){var e=this.renderData.dateModule,g=this._edProps;
if("label"!=c)if(a.allDay||this.roundToDay){var h=this.isStartOfDay(d[0]);switch(b){case "resizeEnd":!h&&a.allDay&&(d[0]=e.add(d[0],"day",1));case "resizeStart":h||(d[0]=this.floorToDay(d[0],!0));break;case "move":d[0]=e.add(d[0],"day",g.dayOffset);break;case "resizeBoth":h||(d[0]=this.floorToDay(d[0],!0)),this.isStartOfDay(d[1])||(d[1]=this.floorToDay(e.add(d[1],"day",1),!0))}}else d=this.inherited(arguments);return d},getTime:function(a,b,c,d){var f=this.renderData;null!=a&&(c=w.position(this.itemContainer,
!0),a.touches?(d=void 0==d?0:d,b=a.touches[d].pageX-c.x,c=a.touches[d].pageY-c.y):(b=a.pageX-c.x,c=a.pageY-c.y));d=w.getContentBox(this.itemContainer);0>b?b=0:b>d.w&&(b=d.w-1);0>c?c=0:c>d.h&&(c=d.h-1);a=w.getMarginBox(this.itemContainer).w/f.columnCount;c=null==f.expandedRow?Math.floor(c/(w.getMarginBox(this.itemContainer).h/f.rowCount)):f.expandedRow;d=w.getContentBox(this.itemContainer);f.rtl&&(b=d.w-b);d=Math.floor(b/a);b=Math.floor(1440*(b-d*a)/a);a=null;c<f.dates.length&&d<this.renderData.dates[c].length&&
(a=this.newDate(this.renderData.dates[c][d]),a=this.renderData.dateModule.add(a,"minute",b));return a},_onGridMouseUp:function(a){this.inherited(arguments);this._gridMouseDown&&(this._gridMouseDown=!1,this._onGridClick({date:this.getTime(a),triggerEvent:a}))},_onGridTouchEnd:function(a){this.inherited(arguments);var b=this._gridProps;b&&(this._isEditing||(!b.fromItem&&!b.editingOnStart&&this.selectFromEvent(a,null,null,!0),b.fromItem||(this._pendingDoubleTap&&this._pendingDoubleTap.grid?(this._onGridDoubleClick({date:this.getTime(this._gridProps.event),
triggerEvent:this._gridProps.event}),clearTimeout(this._pendingDoubleTap.timer),delete this._pendingDoubleTap):(this._onGridClick({date:this.getTime(this._gridProps.event),triggerEvent:this._gridProps.event}),this._pendingDoubleTap={grid:!0,timer:setTimeout(r.hitch(this,function(){delete this._pendingDoubleTap}),this.doubleTapDelay)}))),this._gridProps=null)},_onRowHeaderClick:function(a){this._dispatchCalendarEvt(a,"onRowHeaderClick")},onRowHeaderClick:function(a){},expandRendererClickHandler:function(a,
b){F.stop(a);var c=b.get("rowIndex"),d=b.get("columnIndex");this._onExpandRendererClick(r.mixin(this._createItemEditEvent(),{rowIndex:c,columnIndex:d,renderer:b,triggerEvent:a,date:this.renderData.dates[c][d]}))},onExpandRendererClick:function(a){},_onExpandRendererClick:function(a){this._dispatchCalendarEvt(a,"onExpandRendererClick");a.isDefaultPrevented()||(-1!=this.getExpandedRowIndex()?this.collapseRow():this.expandRow(a.rowIndex,a.columnIndex))},snapUnit:"minute",snapSteps:15,minDurationUnit:"minute",
minDurationSteps:15,triggerExtent:3,liveLayout:!1,stayInView:!0,allowStartEndSwap:!0,allowResizeLessThan24H:!1})});