// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.12/esri/copyright.txt for details.
//>>built
require({cache:{"esri/layers/MosaicRule":function(){define("dojo/_base/declare dojo/_base/lang dojo/has ../kernel ../lang ../geometry/Point".split(" "),function(b,a,n,k,m,q){var d=b(null,{declaredClass:"esri.layers.MosaicRule",method:null,where:null,sortField:null,sortValue:null,ascending:!1,lockRasterIds:null,viewpoint:null,objectIds:null,operation:null,multidimensionalDefinition:[],constructor:function(l){a.isObject(l)&&(a.mixin(this,l),l.mosaicMethod&&(this.method=l.mosaicMethod),this.method&&
"esri"!==this.method.toLowerCase().substring(0,4)&&(this.method=this._getMethodEnum(this.method)),l.mosaicOperation&&(this.operation=l.mosaicOperation),this.operation&&"MT_"!==this.operation.toUpperCase().substring(0,3)&&(this.operation=this._getOperatorEnum(this.operation)),l.fids&&(this.objectIds=l.fids),l.viewpoint&&(this.viewpoint=new q(l.viewpoint)))},toJson:function(){var a=null,f=this.multidimensionalDefinition?this.multidimensionalDefinition.length:0;if(f)for(var a=[],d=0;d<f;d++)a.push("esri.layers.DimensionalDefinition"===
this.multidimensionalDefinition[d].declaredClass?this.multidimensionalDefinition[d].toJson():this.multidimensionalDefinition[d]);a={mosaicMethod:this.method,where:this.where,sortField:this.sortField,sortValue:this.sortValue,ascending:this.ascending,lockRasterIds:this.lockRasterIds,viewpoint:this.viewpoint?this.viewpoint.toJson():null,fids:this.objectIds,mosaicOperation:this.operation,multidimensionalDefinition:a};return m.filter(a,function(f){if(null!==f)return!0})},_getMethodEnum:function(a){if(a){var f=
d.METHOD_NONE;switch(a.toLowerCase()){case "byattribute":f=d.METHOD_ATTRIBUTE;break;case "center":f=d.METHOD_CENTER;break;case "lockraster":f=d.METHOD_LOCKRASTER;break;case "nadir":f=d.METHOD_NADIR;break;case "northwest":f=d.METHOD_NORTHWEST;break;case "seamline":f=d.METHOD_SEAMLINE;break;case "viewpoint":f=d.METHOD_VIEWPOINT}return f}},_getOperatorEnum:function(a){if(a)switch(a.toLowerCase()){case "first":return d.OPERATION_FIRST;case "last":return d.OPERATION_LAST;case "max":return d.OPERATION_MAX;
case "min":return d.OPERATION_MIN;case "blend":return d.OPERATION_BLEND;case "mean":return d.OPERATION_MEAN}}});a.mixin(d,{METHOD_NONE:"esriMosaicNone",METHOD_CENTER:"esriMosaicCenter",METHOD_NADIR:"esriMosaicNadir",METHOD_VIEWPOINT:"esriMosaicViewpoint",METHOD_ATTRIBUTE:"esriMosaicAttribute",METHOD_LOCKRASTER:"esriMosaicLockRaster",METHOD_NORTHWEST:"esriMosaicNorthwest",METHOD_SEAMLINE:"esriMosaicSeamline",OPERATION_FIRST:"MT_FIRST",OPERATION_LAST:"MT_LAST",OPERATION_MIN:"MT_MIN",OPERATION_MAX:"MT_MAX",
OPERATION_MEAN:"MT_MEAN",OPERATION_BLEND:"MT_BLEND"});n("extend-esri")&&a.setObject("layers.MosaicRule",d,k);return d})},"esri/tasks/ImageServiceIdentifyTask":function(){define("dojo/_base/declare dojo/_base/lang dojo/has ../kernel ../request ../geometry/normalizeUtils ./Task ./ImageServiceIdentifyResult".split(" "),function(b,a,n,k,m,q,d,l){b=b(d,{declaredClass:"esri.tasks.ImageServiceIdentifyTask",constructor:function(f){this._url.path+="/identify";this._handler=a.hitch(this,this._handler)},__msigns:[{n:"execute",
c:3,a:[{i:0,p:["geometry"]}],e:2}],_handler:function(f,a,d,h,g){try{var b=new l(f);this._successHandler([b],"onComplete",d,g)}catch(s){this._errorHandler(s,h,g)}},execute:function(f,d,b,h){var g=h.assembly;f=this._encode(a.mixin({},this._url.query,{f:"json"},f.toJson(g&&g[0])));var l=this._handler,s=this._errorHandler;return m({url:this._url.path,content:f,callbackParamName:"callback",load:function(a,f){l(a,f,d,b,h.dfd)},error:function(a){s(a,b,h.dfd)}})},onComplete:function(){}});q._createWrappers(b);
n("extend-esri")&&a.setObject("tasks.ImageServiceIdentifyTask",b,k);return b})},"esri/tasks/Task":function(){define("dojo/_base/declare dojo/_base/lang dojo/_base/json dojo/has ../kernel ../deferredUtils ../urlUtils ../Evented".split(" "),function(b,a,n,k,m,q,d,l){b=b(l,{declaredClass:"esri.tasks._Task",_eventMap:{error:["error"],complete:["result"]},constructor:function(f,b){f&&a.isString(f)&&(this._url=d.urlToObject(this.url=f));b&&b.requestOptions&&(this.requestOptions=b.requestOptions);this.normalization=
!0;this._errorHandler=a.hitch(this,this._errorHandler);this.registerConnectEvents()},_useSSL:function(){var a=this._url,d=/^http:/i;this.url&&(this.url=this.url.replace(d,"https:"));a&&a.path&&(a.path=a.path.replace(d,"https:"))},_encode:function(d,b,l){var h,g,k={},s,m;for(s in d)if("declaredClass"!==s&&(h=d[s],g=typeof h,null!==h&&void 0!==h&&"function"!==g))if(a.isArray(h)){k[s]=[];m=h.length;for(g=0;g<m;g++)k[s][g]=this._encode(h[g])}else"object"===g?h.toJson&&(g=h.toJson(l&&l[s]),"esri.tasks.FeatureSet"===
h.declaredClass&&g.spatialReference&&(g.sr=g.spatialReference,delete g.spatialReference),k[s]=b?g:n.toJson(g)):k[s]=h;return k},_successHandler:function(a,d,b,h){d&&this[d].apply(this,a);b&&b.apply(null,a);h&&q._resDfd(h,a)},_errorHandler:function(a,d,b){this.onError(a);d&&d(a);b&&b.errback(a)},setNormalization:function(a){this.normalization=a},onError:function(){}});k("extend-esri")&&(m.Task=b);return b})},"esri/tasks/ImageServiceIdentifyResult":function(){define("dojo/_base/declare dojo/_base/lang dojo/has ../kernel ../geometry/jsonUtils ./FeatureSet".split(" "),
function(b,a,n,k,m,q){b=b(null,{declaredClass:"esri.tasks.ImageServiceIdentifyResult",constructor:function(a){a.catalogItems&&(this.catalogItems=new q(a.catalogItems));a.location&&(this.location=m.fromJson(a.location));this.catalogItemVisibilities=a.catalogItemVisibilities;this.name=a.name;this.objectId=a.objectId;this.value=a.value;this.properties=a.properties}});n("extend-esri")&&a.setObject("tasks.ImageServiceIdentifyResult",b,k);return b})},"esri/tasks/ImageServiceIdentifyParameters":function(){define("dojo/_base/declare dojo/_base/lang dojo/_base/json dojo/has ../kernel ../lang ../geometry/jsonUtils".split(" "),
function(b,a,n,k,m,q,d){b=b(null,{declaredClass:"esri.tasks.ImageServiceIdentifyParameters",geometry:null,mosaicRule:null,renderingRule:null,pixelSizeX:null,pixelSizeY:null,pixelSize:null,returnGeometry:!1,returnCatalogItems:!0,timeExtent:null,toJson:function(a){var b=a&&a.geometry||this.geometry;a={geometry:b,returnGeometry:this.returnGeometry,returnCatalogItems:this.returnCatalogItems,mosaicRule:this.mosaicRule?n.toJson(this.mosaicRule.toJson()):null,renderingRule:this.renderingRule?n.toJson(this.renderingRule.toJson()):
null};b&&(a.geometryType=d.getJsonType(b));b=this.timeExtent;a.time=b?b.toJson().join(","):null;q.isDefined(this.pixelSizeX)&&q.isDefined(this.pixelSizeY)?a.pixelSize=n.toJson({x:parseFloat(this.pixelSizeX),y:parseFloat(this.pixelSizeY)}):this.pixelSize&&(a.pixelSize=this.pixelSize?n.toJson(this.pixelSize.toJson()):null);return a}});k("extend-esri")&&a.setObject("tasks.ImageServiceIdentifyParameters",b,m);return b})},"esri/tasks/FeatureSet":function(){define("dojo/_base/declare dojo/_base/lang dojo/_base/array dojo/has ../kernel ../lang ../graphic ../SpatialReference ../graphicsUtils ../geometry/jsonUtils ../symbols/jsonUtils".split(" "),
function(b,a,n,k,m,q,d,l,f,r,z){b=b(null,{declaredClass:"esri.tasks.FeatureSet",constructor:function(b){if(b){a.mixin(this,b);var g=this.features,f=b.spatialReference,k=r.getGeometryType(b.geometryType),f=this.spatialReference=new l(f);this.geometryType=b.geometryType;b.fields&&(this.fields=b.fields);n.forEach(g,function(a,b){var h=a.geometry&&a.geometry.spatialReference;g[b]=new d(k&&a.geometry?new k(a.geometry):null,a.symbol&&z.fromJson(a.symbol),a.attributes);g[b].geometry&&!h&&g[b].geometry.setSpatialReference(f)});
this._hydrate()}else this.features=[]},displayFieldName:null,geometryType:null,spatialReference:null,fieldAliases:null,toJson:function(a){var b={};this.displayFieldName&&(b.displayFieldName=this.displayFieldName);this.fields&&(b.fields=this.fields);this.spatialReference?b.spatialReference=this.spatialReference.toJson():this.features[0]&&this.features[0].geometry&&(b.spatialReference=this.features[0].geometry.spatialReference.toJson());this.features[0]&&(this.features[0].geometry&&(b.geometryType=
r.getJsonType(this.features[0].geometry)),b.features=f._encodeGraphics(this.features,a));b.exceededTransferLimit=this.exceededTransferLimit;return q.fixJson(b)},_hydrate:function(){var a=this.transform;if(a){var b=this.features,d,f=a.translate[0],k=a.translate[1],l=a.scale[0],n=a.scale[1],m=function(a,b,d){if("esriGeometryPoint"===a)return function(a){a.x=b(a.x);a.y=d(a.y)};if("esriGeometryPolyline"===a||"esriGeometryPolygon"===a)return function(a){a=a.rings||a.paths;var f,g,e,H,c,w,F,k;f=0;for(g=
a.length;f<g;f++){c=a[f];e=0;for(H=c.length;e<H;e++)w=c[e],0<e?(F+=w[0],k+=w[1]):(F=w[0],k=w[1]),w[0]=b(F),w[1]=d(k)}};if("esriGeometryEnvelope"===a)return function(a){a.xmin=b(a.xmin);a.ymin=d(a.ymin);a.xmax=b(a.xmax);a.ymax=d(a.ymax)};if("esriGeometryMultipoint"===a)return function(a){a=a.points;var f,g,e;f=0;for(g=a.length;f<g;f++)e=a[f],e[0]=b(void 0),e[1]=d(void 0)}}(this.geometryType,function(a){return a*l+f},function(a){return k-a*n}),a=0;for(d=b.length;a<d;a++)b[a].geometry&&m(b[a].geometry);
this.transform=null}}});k("extend-esri")&&a.setObject("tasks.FeatureSet",b,m);return b})},"*noref":1}});
define("esri/layers/ArcGISImageServiceLayer","dojo/_base/declare dojo/_base/lang dojo/_base/Deferred dojo/_base/array dojo/_base/json dojo/_base/config dojo/has dojo/io-query ../kernel ../config ../lang ../request ../deferredUtils ../urlUtils ../geometry/Extent ../geometry/Point ../SpatialReference ./MosaicRule ./DynamicMapServiceLayer ./TimeInfo ./Field ../graphic ../tasks/ImageServiceIdentifyTask ../tasks/ImageServiceIdentifyParameters ../geometry/Polygon".split(" "),function(b,a,n,k,m,q,d,l,f,
r,z,h,g,G,s,I,Q,E,P,J,K,L,M,N,O){b=b(P,{declaredClass:"esri.layers.ArcGISImageServiceLayer",_eventMap:{"rendering-change":!0,"mosaic-rule-change":!0},constructor:function(e,b){this._url=G.urlToObject(e);var c=b&&b.imageServiceParameters;this.format=c&&c.format;this.interpolation=c?c.interpolation:null;this.compressionQuality=c?c.compressionQuality:null;this.bandIds=c?c.bandIds:null;this.mosaicRule=c?c.mosaicRule:null;this.renderingRule=c?c.renderingRule:null;this._params=a.mixin({},this._url.query,
{f:"image",interpolation:this.interpolation,format:this.format,compressionQuality:this.compressionQuality,bandIds:this.bandIds?this.bandIds.join(","):null},c?c.toJson():{});this._initLayer=a.hitch(this,this._initLayer);this._queryVisibleRastersHandler=a.hitch(this,this._queryVisibleRastersHandler);this._visibleRasters=[];this.useMapImage=b&&b.useMapImage||!1;this.infoTemplate=b&&b.infoTemplate;this._rasterAttributeTableFields=[];this._rasterAttributeTableFeatures=[];this._loadCallback=b&&b.loadCallback;
(c=b&&b.resourceInfo)?this._initLayer(c):h({url:this._url.path,content:a.mixin({f:"json"},this._url.query),callbackParamName:"callback",load:this._initLayer,error:this._errorHandler});this.registerConnectEvents()},disableClientCaching:!1,_initLayer:function(e,b){this._findCredential();(this.credential&&this.credential.ssl||e&&e._ssl)&&this._useSSL();var c=this.minScale,d=this.maxScale;a.mixin(this,e);this.minScale=c;this.maxScale=d;this.initialExtent=this.fullExtent=this.extent=new s(e.extent);this.spatialReference=
this.initialExtent.spatialReference;this.pixelSizeX=parseFloat(this.pixelSizeX);this.pixelSizeY=parseFloat(this.pixelSizeY);for(var f=this.minValues,g=this.maxValues,k=this.meanValues,h=this.stdvValues,l=this.bands=[],c=0,d=this.bandCount;c<d;c++)l[c]={min:f[c],max:g[c],mean:k[c],stddev:h[c]};this.timeInfo=(c=this.timeInfo)&&c.timeExtent?new J(c):null;d=this.fields=[];if(f=e.fields)for(c=0;c<f.length;c++)d.push(new K(f[c]));this.version=e.currentVersion;this.version||(this.version="fields"in e||"objectIdField"in
e||"timeInfo"in e?10:9.3);z.isDefined(e.minScale)&&!this._hasMin&&this.setMinScale(e.minScale);z.isDefined(e.maxScale)&&!this._hasMax&&this.setMaxScale(e.maxScale);c={};e.defaultMosaicMethod?(c.method=e.defaultMosaicMethod,c.operation=e.mosaicOperator,c.sortField=e.sortField,c.sortValue=e.sortValue):c.method=E.METHOD_NONE;this.defaultMosaicRule=new E(c);this.defaultMosaicRule.ascending=!0;10<this.version&&this.hasRasterAttributeTable&&this.getRasterAttributeTable().then(a.hitch(this,function(e){e&&
(e.features&&0<e.features.length)&&(this._rasterAttributeTableFeatures=a.clone(e.features));e&&(e.fields&&0<e.fields.length)&&(this._rasterAttributeTableFields=a.clone(e.fields))}));this.loaded=!0;this.onLoad(this);if(c=this._loadCallback)delete this._loadCallback,c(this)},getKeyProperties:function(){var a=this._url.path+"/keyProperties",b=new n(g._dfdCanceller);10<this.version?(b._pendingDfd=h({url:a,content:{f:"json"},handleAs:"json",callbackParamName:"callback"}),b._pendingDfd.then(function(a){b.callback(a)},
function(a){b.errback(a)})):(a=Error("Layer does not have key properties"),a.log=q.isDebug,b.errback(a));return b},getRasterAttributeTable:function(){var a=this._url.path+"/rasterAttributeTable",b=new n(g._dfdCanceller);10<this.version&&this.hasRasterAttributeTable?(b._pendingDfd=h({url:a,content:{f:"json"},handleAs:"json",callbackParamName:"callback"}),b._pendingDfd.then(function(a){b.callback(a)},function(a){b.errback(a)})):(a=Error("Layer does not support raster attribute table"),a.log=q.isDebug,
b.errback(a));return b},_getRasterAttributeTableFeatures:function(){var e=new n;if(this._rasterAttributeTableFeatures&&0<this._rasterAttributeTableFeatures.length)return e.resolve(this._rasterAttributeTableFeatures),e;if(10<this.version&&this.hasRasterAttributeTable)return e=this.getRasterAttributeTable(),e.then(a.hitch(this,function(e){e&&(e.features&&0<e.features.length)&&(this._rasterAttributeTableFeatures=a.clone(e.features))})),e;e.resolve(this._rasterAttributeTableFeatures);return e},getCustomRasterFields:function(e){var b=
e?e.rasterAttributeTableFieldPrefix:"",c={name:"Raster.ItemPixelValue",alias:"Item Pixel Value",domain:null,editable:!1,length:50,type:"esriFieldTypeString"};e=this.fields?a.clone(this.fields):[];var d=e.length;e[d]={name:"Raster.ServicePixelValue",alias:"Service Pixel Value",domain:null,editable:!1,length:50,type:"esriFieldTypeString"};if(this.capabilities&&-1<this.capabilities.toLowerCase().indexOf("catalog")||this.fields&&0<this.fields.length)e[d+1]=c;this._rasterAttributeTableFields&&0<this._rasterAttributeTableFields.length&&
(c=k.filter(this._rasterAttributeTableFields,function(a){return"esriFieldTypeOID"!==a.type&&"value"!==a.name.toLowerCase()}),c=k.map(c,function(e){var c=a.clone(e);c.name=b+e.name;return c}),e=e.concat(c));return e},getImageUrl:function(e,b,c,d){var f=e.spatialReference.wkid||m.toJson(e.spatialReference.toJson());delete this._params._ts;var g=this._url.path+"/exportImage?";a.mixin(this._params,{bbox:e.xmin+","+e.ymin+","+e.xmax+","+e.ymax,imageSR:f,bboxSR:f,size:b+","+c},this.disableClientCaching?
{_ts:(new Date).getTime()}:{});var k=this._params.token=this._getToken();e=G.addProxy(g+l.objectToQuery(a.mixin(this._params,{f:"image"})));e.length>r.defaults.io.postLength||this.useMapImage?this._jsonRequest=h({url:g,content:a.mixin(this._params,{f:"json"}),callbackParamName:"callback",load:function(a,e){var b=a.href;k&&(b+=-1===b.indexOf("?")?"?token\x3d"+k:"\x26token\x3d"+k);d(G.addProxy(b))},error:this._errorHandler}):d(e)},onRenderingChange:function(){},onMosaicRuleChange:function(){},setInterpolation:function(a,
b){this.interpolation=this._params.interpolation=a;b||this.refresh(!0)},setCompressionQuality:function(a,b){this.compressionQuality=this._params.compressionQuality=a;b||this.refresh(!0)},setBandIds:function(a,b){var c=!1;this.bandIds!==a&&(c=!0);this.bandIds=a;this._params.bandIds=a.join(",");if(c&&!b)this.onRenderingChange();b||this.refresh(!0)},setDefaultBandIds:function(a){this.bandIds=this._params.bandIds=null;a||this.refresh(!0)},setDisableClientCaching:function(a){this.disableClientCaching=
a},setMosaicRule:function(a,b){var c=!1;this.mosaicRule!==a&&(c=!0);this.mosaicRule=a;this._params.mosaicRule=m.toJson(a.toJson());if(c&&!b)this.onMosaicRuleChange();b||this.refresh(!0)},setRenderingRule:function(a,b){var c=!1;this.renderingRule!==a&&(c=!0);this.renderingRule=a;this._params.renderingRule=a?m.toJson(a.toJson()):null;if(c&&!b)this.onRenderingChange();b||this.refresh(!0)},setImageFormat:function(a,b){this.format=this._params.format=a;b||this.refresh(!0)},setInfoTemplate:function(a){this.infoTemplate=
a},setDefinitionExpression:function(a,b){var c=this.mosaicRule?this.mosaicRule.toJson():{};this.mosaicRule||(this.defaultMosaicRule?c=this.defaultMosaicRule.toJson():c.method=E.METHOD_NONE);c.where=a;c=new E(c);this.setMosaicRule(c,b);return this},getDefinitionExpression:function(){return this.mosaicRule?this.mosaicRule.where:null},refresh:function(a){if(a)this.inherited(arguments);else{var b=this.disableClientCaching;this.disableClientCaching=!0;this.inherited(arguments);this.disableClientCaching=
b}},exportMapImage:function(b,d){var c=r.defaults.map,c=a.mixin({size:c.width+","+c.height},this._params,b?b.toJson(this.normalization):{},{f:"json"});delete c._ts;this._exportMapImage(this._url.path+"/exportImage",c,d)},queryVisibleRasters:function(a,b,c,d){var f=this._map,k=g._fixDfd(new n(g._dfdCanceller));this._visibleRasters=[];var h,l,m=!0,p;if(this.infoTemplate&&this.infoTemplate.info.fieldInfos&&0<this.infoTemplate.info.fieldInfos.length){m=!1;p=this.infoTemplate.info;for(h=0;h<p.fieldInfos.length;h++)if((l=
p.fieldInfos[h])&&"raster.servicepixelvalue"!==l.fieldName.toLowerCase()&&(l.visible||p.title&&-1<p.title.toLowerCase().indexOf(l.fieldName.toLowerCase()))){m=!0;break}}h=new N;h.geometry=a.geometry;h.returnGeometry=this._map.spatialReference.equals(this.spatialReference);h.returnCatalogItems=m;h.timeExtent=a.timeExtent;h.mosaicRule=this.mosaicRule?this.mosaicRule:null;h.renderingRule=this.renderingRule?this.renderingRule:null;f&&(a=new I((f.extent.xmax-f.extent.xmin)/(2*f.width),(f.extent.ymax-f.extent.ymin)/
(2*f.height),f.extent.spatialReference),h.pixelSize=a);var q=this;a=new M(this.url);(k._pendingDfd=a.execute(h)).addCallbacks(function(a){q._queryVisibleRastersHandler(a,b,c,d,k)},function(a){q._resolve([a],null,d,k,!0)});return k},_queryVisibleRastersHandler:function(b,d,c,f,g){function l(){var b=this.getCustomRasterFields(d),e=this._getDomainFields(b),f=d?d.returnDomainValues:!1,h=d&&d.rasterAttributeTableFieldPrefix,m,p,w,s,r,v,y,x;this._getRasterAttributeTableFeatures().then(a.hitch(this,function(b){for(m=
0;m<t.length;m++){u=t[m];u.setInfoTemplate(this.infoTemplate);u._layer=this;if(n&&(p=n,q&&q.length>=m&&(w=q[m],p=w.replace(/ /gi,", ")),u.attributes["Raster.ItemPixelValue"]=p,u.attributes["Raster.ServicePixelValue"]=n,b&&0<b.length&&(s=k.filter(b,function(a){if(a&&a.attributes)return a.attributes.hasOwnProperty("Value")?a.attributes.Value==p:a.attributes.VALUE==p}),0<s.length&&(r=a.clone(s[0]),h&&r)))){x={};for(v in r.attributes)r.attributes.hasOwnProperty(v)&&(y=h+v,x[y]=r.attributes[v]);r.attributes=
x;u.attributes=a.mixin(u.attributes,r.attributes)}f&&(e&&0<e.length)&&k.forEach(e,function(a){if(a){var b=u.attributes[a.name];z.isDefined(b)&&(b=this._getDomainValue(a.domain,b),z.isDefined(b)&&(u.attributes[a.name]=b))}},this);A.push(u);this._visibleRasters.push(u)}this._resolve([A,null,!0],null,c,g)}))}var n=b.value,q,t,p=0,v=0,r=this,x=this.objectIdField,B;if(b.catalogItems){f=0;var C,D,y=b.catalogItems.features.length;C=0;t=Array(y);q=Array(y);B=Array(y);for(p=0;p<y;p++)-1<b.properties.Values[p].toLowerCase().indexOf("nodata")&&
C++;C=y-C;for(p=0;p<y;p++)D=-1<b.properties.Values[p].toLowerCase().indexOf("nodata")?C++:f++,t[D]=b.catalogItems.features[p],q[D]=b.properties.Values[p],B[D]=t[D].attributes[x]}this._visibleRasters=[];var u;b=-1<n.toLowerCase().indexOf("nodata");n&&(!t&&!b)&&(x="ObjectId",t=[],u=new L(new s(this.fullExtent),null,{ObjectId:0}),t.push(u));var A=[];t?!this._map.spatialReference.equals(this.spatialReference)&&B&&0<B.length?h({url:this._url.path+"/query",content:{f:"json",objectIds:B.join(","),returnGeometry:!0,
outSR:m.toJson(r._map.spatialReference.toJson()),outFields:x},handleAs:"json",callbackParamName:"callback",load:function(a){if(0===a.features.length)r._resolve([A,null,null],null,c,g);else{for(p=0;p<a.features.length;p++)for(v=0;v<t.length;v++)t[v].attributes[x]==a.features[p].attributes[x]&&(t[v].geometry=new O(a.features[p].geometry),t[v].geometry.setSpatialReference(r._map.spatialReference));l.call(r)}},error:function(a){r._resolve([A,null,null],null,c,g)}}):l.call(this):this._resolve([A,null,
null],null,c,g)},getVisibleRasters:function(){var a=this._visibleRasters,b=[],c;for(c in a)a.hasOwnProperty(c)&&b.push(a[c]);return b},_getDomainFields:function(a){if(a){var b=[];k.forEach(a,function(a){if(a.domain){var e={};e.name=a.name;e.domain=a.domain;b.push(e)}});return b}},_getDomainValue:function(a,b){if(a&&a.codedValues){var c;k.some(a.codedValues,function(a){return a.code===b?(c=a.name,!0):!1});return c}},_resolve:function(a,b,c,d,f){b&&this[b].apply(this,a);c&&c.apply(null,a);d&&g._resDfd(d,
a,f)}});d("extend-esri")&&a.setObject("layers.ArcGISImageServiceLayer",b,f);return b});