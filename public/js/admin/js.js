$(document).ready(function() {
    $('.tab-category').each(function(){
      $(this).click(function(){
        var category = $(this).attr('data-href');
        $('.add-properties').attr('data-value', category);
      });
    });
    $('.add-properties').click(function(){
      var category = $(this).attr('data-value');
      console.log('#'+category);
      var count = $('#'+category).find('input.item-properties-name').length;
      count = count;
      console.log("Count of input "+count);
      var html = '<div class="form-horizontal">'
                  +'<div class="col-md-6 col-sm-6 col-xs-6 form-group">'
                  +'<input class="form-control col-md-7 col-xs-12 item-properties-name" required="required" name="'+category+'[name]['+count+']" value="" type="text">'
                  +'</div>'
                  +'<div class="col-md-6 col-sm-6 col-xs-6 form-group">'
                  +'<input class="form-control col-md-7 col-xs-12 item-properties-value" required="required" name="'+category+'[value]['+count+']" value="" type="text">'
                  +'</div>'
                +'</div>'
      console.log(html);
      $("input[name='"+category+"[category]']").after(html);
      /*.each(function(){
        console.log($(this).length());
      });*/
    });
});
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
