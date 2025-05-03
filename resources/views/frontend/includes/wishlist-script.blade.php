<script>
    $(document).ready(function(){
        $('.wishlist-toggle-btn').click(function(e){
            e.preventDefault();
            let button = $(this);
            let productId = $(this).data('id');
            let icon = $('#wishlist-icon-' + productId)
            // alert(button);

            // ajax request
            $.ajax({
                url: '{{ route('wishlist.toggle') }}',
                type: "POST",
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response)
                {
                    // console.log(response);
                    // alert(response.product_id);
                    if(response.status === "added"){
                       icon.removeClass('bi-heart').addClass('bi-heart-fill');

                       button.css({
                        'background-color': '#5d3fd3',
                        'color': 'white'
                       })

                    }else{
                        // console.log('removed hello hel')
                        icon.removeClass('bi-heart-fill').addClass('bi-heart');

                       button.css({
                        'background-color': '',
                        'color': ''
                       })
                    }
                },
                error: function(xhr){
                    console.error(xhr.responseText)
                }
            });
        });
    });
</script>