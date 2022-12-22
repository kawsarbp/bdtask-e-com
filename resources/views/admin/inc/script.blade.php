
<!-- js placed at the end of the document so the pages load faster -->
<script src="/backend/js/jquery.js"></script>
<script src="/backend/js/bootstrap.bundle.min.js"></script>
<script class="include" type="text/javascript" src="/backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/backend/js/jquery.scrollTo.min.js"></script>
<script src="/backend/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="/backend/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="/backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="/backend/js/owl.carousel.js" ></script>
<script src="/backend/js/jquery.customSelect.min.js" ></script>
<script src="/backend/js/respond.min.js" ></script>

<!--right slidebar-->
<script src="/backend/js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="/backend/js/common-scripts5e1f.js?v=2"></script>



<!--dynamic table initialization -->

<script type="text/javascript" language="javascript" src="/backend/js/datatable/jquery.dataTables.js"></script>
<script type="text/javascript" src="/backend/js/datatable/DT_bootstrap.js"></script>
<script src="/backend/js/datatable/dynamic_table_init.js"></script>


<!--script for this page-->
<script src="/backend/js/sparkline-chart.js"></script>
<script src="/backend/js/easy-pie-chart.js"></script>
<script src="/backend/js/count.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

    $(window).on("resize",function(){
        var owl = $("#owl-demo").data("owlCarousel");
        owl.reinit();
    });

</script>


@if(session()->has('message'))
    <script>
        toastr.{{ session()->get('type') }}(" {!! session()->get('message') !!} ");
    </script>
@endif
