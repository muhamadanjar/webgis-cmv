var sublayer_ = new Array();
var fields = [];
var gl_store = [];
var url,layersRequest;
/*require(["jquery", "dojo/query","dojo/dom","esri/request","dojo/_base/json","dojo/domReady!" ], 
	function(jquery,dojojquery,dom,esriRequest,dojoJson) {
        
	    
	    jquery('#btn-load-layerurl').click(function(e){
            url = document.getElementById('layerurl').value;
        
            layersRequest = esriRequest({
                url: url,
                content: { f: "json" },
                handleAs: "json",
                callbackParamName: "callback"
            });
            console.log(url);
            layersRequest.then(response_layersRequest,error_layersRequest);
        });
	
        
        function requestFSucceeded(response){
        	
        	if (response.hasOwnProperty("fields")) {
        		for (var prop_fields in response.fields) {
        			var field = response.fields[prop_fields];

        			fields.push({
        				'fields':field.name,
        				'alias':field.alias
        			});
        		}
        	}

        	return fields;
        }

	    function response_layersRequest(response){
            //console.log(response);
            var jsonstr_ = [];
            if (response.hasOwnProperty("fields")) {
                console.log('fields');
                $.ajax({
                    url: jquery('#layerurl').val(),
                    type: "get",
                    dataType:"json",
                    data: {'f':'json', '_token': $('input[name=_token]').val()},
                    success: function(data){
                        //data = data.sort(function(b,a) { return a.id > b.id });
                        console.log(data);
                        
                        jsonstr_.push(JSON.stringify({'id':data.id,'name':data.name,'fields':data.fields}));
                        
                        $('#jsonfield').val('['+jsonstr_+']');
                        $('.jsonfield_code').html('['+jsonstr_+']');
                        

                    },
                    error:function(e){
                        console.log(e)
                    }
                });
            }else{
    	    	for (var prop in response.layers) {

                    if (response.layers.hasOwnProperty(prop)) {
                        name = response.layers[prop].name;
                        id = response.layers[prop].id;
                        sublayer_.push({
                        	'name':name,
                        	'id':id
                        })
                    }

                }
            
                var newjson = [];
                var jsonstr = [];
                var str = '';
                
                for (var i in sublayer_) {
                	id_ = sublayer_[i].id;
                	newurl = url+'/'+id_;
                    console.log(newurl);
                	$.ajax({
    		            url: newurl,
    		            type: "get",
    		            dataType:"json",
    		            data: {'f':'json', '_token': $('input[name=_token]').val()},
    		            success: function(data){
    		            	console.log((data));
                            
    		            	newjson.push({'id':data.id,'name':data.name,'fields':data.fields});
                            jsonstr.push(JSON.stringify({'id':data.id,'name':data.name,'fields':data.fields}));
                            //console.log(newjson);

                            $('#jsonfield').val(JSON.stringify(newjson));
                            $('.jsonfield_code').html(JSON.stringify(newjson));
                            
    		            },
    		            error:function(e){
    		            	console.log(e)
    		            }
    		        });
    		        
    		       	
               	}
            }  	
        }

	    function error_layersRequest(error){
	    	console.log("Error: ", error.message);
	    }

	}
);*/

      $('#btn-load-layerurl').click(function(e){
            url = document.getElementById('layerurl').value;
        
            layersRequest = esri.request({
                url: url,
                content: { f: "json" },
                handleAs: "json",
                callbackParamName: "callback"
            });
            //console.log(url);
            layersRequest.then(response_layersRequest,error_layersRequest);
        });

        function response_layersRequest(response){
            //console.log(response);
            var jsonstr_ = [];
            if (response.hasOwnProperty("fields")) {
                console.log('fields');
                $.ajax({
                    url: $('#layerurl').val(),
                    type: "get",
                    dataType:"json",
                    data: {'f':'json', '_token': $('input[name=_token]').val()},
                    success: function(data){
                        //data = data.sort(function(b,a) { return a.id > b.id });
                        //console.log(data);
                        jsonstr_.push(JSON.stringify({'id':data.id,'name':data.name,'fields':data.fields}));
                        $('#jsonfield').val('['+jsonstr_+']');
                        $('.jsonfield_code').html('['+jsonstr_+']');
                        

                    },
                    error:function(e){
                        console.log(e)
                    }
                });
            }else{
    	    	for (var prop in response.layers) {

                    if (response.layers.hasOwnProperty(prop)) {
                        name = response.layers[prop].name;
                        id = response.layers[prop].id;
                        sublayer_.push({
                        	'name':name,
                        	'id':id
                        })
                    }

                }
            
                var newjson = [];
                var jsonstr = [];
                var str = '';
                
                for (var i in sublayer_) {
                	id_ = sublayer_[i].id;
                	newurl = url+'/'+id_;
                    console.log(newurl);
                	$.ajax({
    		            url: newurl,
    		            type: "get",
    		            dataType:"json",
    		            data: {'f':'json', '_token': $('input[name=_token]').val()},
    		            success: function(data){
    		            	console.log((data));
                            
    		            	newjson.push({'id':data.id,'name':data.name,'fields':data.fields});
                            jsonstr.push(JSON.stringify({'id':data.id,'name':data.name,'fields':data.fields}));
                            //console.log(newjson);

                            $('#jsonfield').val(JSON.stringify(newjson));
                            $('.jsonfield_code').html(JSON.stringify(newjson));
                            
    		            },
    		            error:function(e){
    		            	console.log(e)
    		            }
    		        });
    		        
    		       	
               	}
            }  	
        }

        function error_layersRequest(error){
	    	console.log("Error: ", error.message);
	    }

