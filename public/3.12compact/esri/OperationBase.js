// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.12/esri/copyright.txt for details.
//>>built
define("esri/OperationBase",["dojo/_base/declare","dojo/has","./kernel"],function(a,b,c){a=a(null,{declaredClass:"esri.OperationBase",type:"not implemented",label:"not implemented",constructor:function(a){a=a||{};a.label&&(this.label=a.label)},performUndo:function(){console.log("performUndo has not been implemented")},performRedo:function(){console.log("performRedo has not been implemented")}});b("extend-esri")&&(c.OperationBase=a);return a});