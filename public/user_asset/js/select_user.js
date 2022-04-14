
$(document).ready(function(){
	$("#user_id").change(function() {
	        var user_id = $('option:selected', this).val();
	        var url = $('#selecturl').val();
	        jQuery.ajax({
                type: 'POST',
                url:$('#selecturl').val(),
                dataType:"JSON",
                data: {user_id:user_id},
                success: function (data) {
                	console.log(data);
                	$('.odd').hide();
                	appendRows(data);

                }
            });
	    });

	  function appendRows(data){
    	var content = '';
			  content += '<tr id="'+data[0]['id']+'">';
			  content += '<td class="py-1 capt-cls row_id">'+ data[0]['id'] +'</td>';
	          content += '<td class="py-1 description col_description">'+ data[0]['employee_name'] +'</td>';
	          content += '<td class="py-1 capt-cls quotation">'+ data[0]['name'] +'</td>';
	          content += '<td class="py-1 capt-cls quantity">'+ data[0]['relation'] +'</td>';
	          content += '<td class="py-1 capt-cls quantity">'+ data[0]['dob'] +'</td>';
	          content += '<td class="py-1 capt-cls quantity">'+ data[0]['blood_group'] +'</td>';
	          content += '<td class="py-1 delete_row" id="'+ data +'"><a href="" class="btn btn-success btn-rounded btn-icon btn-common-pdng" title="Edit"><i class="ti-pencil"></i></a><a href="" class="btn btn-danger btn-rounded btn-icon btn-common-pdng delete-value" id="" title="Delete"><i class="ti-trash"></i></a></td>';
	          content += '</tr>';
	          $('.member-table tbody').append(content); 
    }

     $("#employee_type").change(function() {
        var isRetired = $('option:selected', this).text();
        if(isRetired == 'Retired'){
        	$('.dateOfRetirement').attr("style", "display:block");
        }else if(isRetired == 'Current'){
        	$('.dateOfRetirement').attr("style", "display:none");
        }

    });

    var isRetired = $('#employee_type option:selected', this).text(); 
    if(isRetired == 'Retired'){
        $('.dateOfRetirement').attr("style", "display:block");
    }else if(isRetired == 'Current'){
        $('.dateOfRetirement').attr("style", "display:none");
    }

    
});
    
