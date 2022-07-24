jQuery(function(){
    $('.delete-item').submit(function(e){
        if(!confirm('Are you sure to delete this item?')){
            e.preventDefault();
            return false;
        }
    });
})