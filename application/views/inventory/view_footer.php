            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
            <script src="//code.jquery.com/jquery.js"></script>
            <!-- Bootstrap JavaScript -->
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

            <script src="<?php echo site_url(); ?>assets/Bootstrap-3-Typeahead-master/bootstrap3-typeahead.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function(e){
            var site_url = "<?php echo site_url(); ?>";
            var input = $("input[name=product_name]");

            $.get(site_url+'home/json_search_country', function(data){
                input.typeahead({
                    source: data,
                    minLength: 1,
                });
            }, 'json');

            input.change(function(){
                var current = input.typeahead("getActive");
                $('#product_id').val(current.id);
            });
        });
    </script>




    <!-- Morris Charts JavaScript -->
    <?php /*
    <script src="<?=  //base_url()?>assets/js/plugins/morris/raphael.min.js"></script>
    <script src="<?= // base_url()?>assets/js/plugins/morris/morris.min.js"></script>
    <script src="<?= // base_url()?>assets/js/plugins/morris/morris-data.js"></script>
    */
    ?>    <script type="text/javascript">
        $(document).ready(function(){
            $('#add').click(function(){
                addnewrow();
            });

            $('.detail').delegate('.quantity,.price,.discount','keyup',function(){
                var tr = $(this).parent().parent();
                var qty = tr.find('.quantity').val();
                var price = tr.find('.price').val();
                var amt = qty * price;
                //Discount option if needed
                var dis = tr.find('.discount').val();
                var amt = (qty * price) - (qty * price * dis)/100;
                tr.find('.amount').val(amt);

                total();

                $('.inWord').html(inWords(total()));

            });


            $('body').delegate('.remove','click',function(){
                $(this).parent().parent().remove();
            });

        });
        /**
         * Total Amount
         */
        function total(){
            var t = 0;
            $('.amount').each(function (i,e) {
                var amt = $(this).val()-0;
                t += amt;
            });
            $('.inWord').html(inWords(t));
            $('.total').html(t);
        }


        function addnewrow(){
            var n = ($('.detail tr').length-0)+1;
            var tr = '<tr>'+
                '<td class="no">' + n + '</td>'+
                '<td><?php 	$attributes = 'class="form-control" id="form-product"';
				            echo form_dropdown('productname',$product,set_value('product'),$attributes);
				?></td>'+
                '<td><input type="text" class="form-control quantity" name="quantity[]"></td>'+
                '<td><input type="text" class="form-control price" name="price[]"></td>'+
                '<td><input type="text" class="form-control discount" name="discount[]"></td>'+
                '<td><input type="text" class="form-control amount" name="amount[]"></td>'+
                '<td><a href="#" class="remove">Delete</a> </td>'+
                '<td></td>'+
                '</tr>';

            $('.detail').append(tr);
        }




        var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
        var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

        function inWords (num) {
            if ((num = num.toString()).length > 9) return 'overflow';
            n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return;
            var str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
            return str;
        }


    </script>


</body>

</html>
