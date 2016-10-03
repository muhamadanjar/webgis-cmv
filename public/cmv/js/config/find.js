define({
   map: true,
   zoomExtentFactor: 2,
   queries: [
	   {
		   description: 'Sebaran Fasilitas',
		   url: 'http://silver-pc:6080/arcgis/rest/services/SIMPOSI/PETA_SEBARAN_FASILITAS/MapServer',
		   layerIds: [0],
		   searchFields: ['POI_NAMA','FASILITAS'],
		   minChars: 2,
		   
		   
		   selectionMode: 'single'
	   },
	   {
		   description: 'Kecamatan',
		   url: 'http://localhost:6080/arcgis/rest/services/SIMPOSI/PETA_ADMINISTRASI_KABUPATEN_BOGOR/MapServer',
		   layerIds: [10],
		   searchFields: ['Toponimi_Kecamatan'],
		   minChars: 2,
		   
		   
		   selectionMode: 'single'
	   },
	   {
		   description: 'Desa',
		   url: 'http://localhost:6080/arcgis/rest/services/SIMPOSI/PETA_ADMINISTRASI_KABUPATEN_BOGOR/MapServer',
		   layerIds: [9],
		   searchFields: ['Toponimi_Desa'],
		   minChars: 2,
		   
		   
		   selectionMode: 'single'
	   },
   ],
   selectionSymbols: {
	   polygon: {
		   type   : 'esriSFS',
		   style  : 'esriSFSSolid',
		   color  : [255, 0, 0, 62],
		   outline: {
			   type : 'esriSLS',
			   style: 'esriSLSSolid',
			   color: [255, 0, 0, 255],
			   width: 3
		   }
	   },
	   point: {
		   type   : 'esriSMS',
		   style  : 'esriSMSCircle',
		   size   : 25,
		   color  : [255, 0, 0, 62],
		   angle  : 0,
		   xoffset: 0,
		   yoffset: 0,
		   outline: {
			   type : 'esriSLS',
			   style: 'esriSLSSolid',
			   color: [255, 0, 0, 255],
			   width: 2
		   }
	   }
   },
   selectionMode   : 'extended'
});