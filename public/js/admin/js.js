/*$table = $('#table-main1').dynatable({
    	  dataset: {
    	    ajax: true,
    	    ajaxUrl: '{{ url('admin/'.$type.'/data') }}',
    	    ajaxOnLoad: true,
    	    records: []
    	  },
    	  // Built-in writer functions,
    	  // can be overwritten, any additional functions
    	  // provided in writers will be merged with
    	  // this default object.
    	  writers: {
    	    _rowWriter: customAttributeWriter,
    	    //_cellWriter: defaultCellWriter,
    	   // _attributeWriter: defaultAttributeWriter
    	  },
    	  // Built-in reader functions,
    	  // can be overwritten, any additional functions
    	  // provided in readers will be merged with
    	  // this default object.
    	  readers: {
    	   // _rowReader: null,
    	    //_attributeReader: defaultAttributeReader
    	  },
    	});

    	// Function that renders the list items from our records
    	function customAttributeWriter(rowIndex, record, columns, cellWriter) {
    	  //console.log(record.created_at.date);
    	  //console.log(columns);
    	  var tr = '';

    	    // grab the record's attribute for each column
    	    for (var i = 0, len = columns.length; i < len; i++) {
        	  //console.log(columns[i]);
        	  //if(columns[i].id=="createdAt"){
				//	console.log(cellWriter(columns[i], record.created_at));
        		//  tr += cellWriter(columns[i], record);
        		//  console.log(tr);
        	 // }else{
    	      	tr += cellWriter(columns[i], record);
    	     // }
    	    }
    	    return '<tr>' + tr + '</tr>';
    	}*/