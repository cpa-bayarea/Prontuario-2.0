@extends('layouts.app')
@section('content-title', 'Lista de pacientes em triagem')
@section('content')

    <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Simple FooTable with pagination, sorting and filter</h5>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#" class="dropdown-item">Config option 1</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control form-control-sm m-b-xs" id="filter" placeholder="Search in table">

                            <table class="footable table table-stripped footable-loaded tablet breakpoint" data-page-size="8" data-filter="#filter">
                                <thead>
                                <tr>
                                    <th class="footable-visible footable-sortable footable-first-column">Rendering engine<span class="footable-sort-indicator"></span></th>
                                    <th class="footable-visible footable-sortable footable-last-column">Browser<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone,tablet" class="footable-sortable" style="display: none;">Platform(s)<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone,tablet" class="footable-sortable" style="display: none;">Engine version<span class="footable-sort-indicator"></span></th>
                                    <th data-hide="phone,tablet" class="footable-sortable" style="display: none;">CSS grade<span class="footable-sort-indicator"></span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeX footable-even" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Trident</td>
                                    <td class="footable-visible footable-last-column">Internet
                                        Explorer 4.0
                                    </td>
                                    <td class="" style="display: none;">Win 95+</td>
                                    <td class="center" style="display: none;">4</td>
                                    <td class="center" style="display: none;">X</td>
                                </tr>
                                <tr class="gradeC footable-odd" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Trident</td>
                                    <td class="footable-visible footable-last-column">Internet
                                        Explorer 5.0
                                    </td>
                                    <td class="" style="display: none;">Win 95+</td>
                                    <td class="center" style="display: none;">5</td>
                                    <td class="center" style="display: none;">C</td>
                                </tr>
                                <tr class="gradeA footable-even" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Trident</td>
                                    <td class="footable-visible footable-last-column">Internet
                                        Explorer 5.5
                                    </td>
                                    <td class="" style="display: none;">Win 95+</td>
                                    <td class="center" style="display: none;">5.5</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-odd" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Gecko</td>
                                    <td class="footable-visible footable-last-column">Netscape Navigator 9</td>
                                    <td class="" style="display: none;">Win 98+ / OSX.2+</td>
                                    <td class="center" style="display: none;">1.8</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>

                                <tr class="gradeA footable-even" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Webkit</td>
                                    <td class="footable-visible footable-last-column">Safari 1.3</td>
                                    <td class="" style="display: none;">OSX.3</td>
                                    <td class="center" style="display: none;">312.8</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-odd" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Webkit</td>
                                    <td class="footable-visible footable-last-column">Safari 2.0</td>
                                    <td class="" style="display: none;">OSX.4+</td>
                                    <td class="center" style="display: none;">419.3</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-even" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Webkit</td>
                                    <td class="footable-visible footable-last-column">Safari 3.0</td>
                                    <td class="" style="display: none;">OSX.4+</td>
                                    <td class="center" style="display: none;">522.1</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-odd" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Webkit</td>
                                    <td class="footable-visible footable-last-column">OmniWeb 5.5</td>
                                    <td class="" style="display: none;">OSX.4+</td>
                                    <td class="center" style="display: none;">420</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-even" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Webkit</td>
                                    <td class="footable-visible footable-last-column">iPod Touch / iPhone</td>
                                    <td class="" style="display: none;">iPod</td>
                                    <td class="center" style="display: none;">420.1</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-odd" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Webkit</td>
                                    <td class="footable-visible footable-last-column">S60</td>
                                    <td class="" style="display: none;">S60</td>
                                    <td class="center" style="display: none;">413</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-even" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Presto</td>
                                    <td class="footable-visible footable-last-column">Opera 7.0</td>
                                    <td class="" style="display: none;">Win 95+ / OSX.1+</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-odd" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Presto</td>
                                    <td class="footable-visible footable-last-column">Opera 7.5</td>
                                    <td class="" style="display: none;">Win 95+ / OSX.2+</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-even" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Presto</td>
                                    <td class="footable-visible footable-last-column">Opera 8.0</td>
                                    <td class="" style="display: none;">Win 95+ / OSX.2+</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-odd" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Presto</td>
                                    <td class="footable-visible footable-last-column">Opera 8.5</td>
                                    <td class="" style="display: none;">Win 95+ / OSX.2+</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-even" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Presto</td>
                                    <td class="footable-visible footable-last-column">Opera 9.0</td>
                                    <td class="" style="display: none;">Win 95+ / OSX.3+</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-odd" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Presto</td>
                                    <td class="footable-visible footable-last-column">Opera 9.2</td>
                                    <td class="" style="display: none;">Win 88+ / OSX.3+</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-even" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Presto</td>
                                    <td class="footable-visible footable-last-column">Opera 9.5</td>
                                    <td class="" style="display: none;">Win 88+ / OSX.3+</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-odd" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Presto</td>
                                    <td class="footable-visible footable-last-column">Opera for Wii</td>
                                    <td class="" style="display: none;">Wii</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-even" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Presto</td>
                                    <td class="footable-visible footable-last-column">Nokia N800</td>
                                    <td class="" style="display: none;">N800</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-odd" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Presto</td>
                                    <td class="footable-visible footable-last-column">Nintendo DS browser</td>
                                    <td class="" style="display: none;">Nintendo DS</td>
                                    <td class="center" style="display: none;">8.5</td>
                                    <td class="center" style="display: none;">C/A<sup>1</sup></td>
                                </tr>
                                <tr class="gradeC footable-even" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>KHTML</td>
                                    <td class="footable-visible footable-last-column">Konqureror 3.1</td>
                                    <td class="" style="display: none;">KDE 3.1</td>
                                    <td class="center" style="display: none;">3.1</td>
                                    <td class="center" style="display: none;">C</td>
                                </tr>
                                <tr class="gradeA footable-odd" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>KHTML</td>
                                    <td class="footable-visible footable-last-column">Konqureror 3.3</td>
                                    <td class="" style="display: none;">KDE 3.3</td>
                                    <td class="center" style="display: none;">3.3</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeA footable-even" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>KHTML</td>
                                    <td class="footable-visible footable-last-column">Konqureror 3.5</td>
                                    <td class="" style="display: none;">KDE 3.5</td>
                                    <td class="center" style="display: none;">3.5</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeX footable-odd" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Tasman</td>
                                    <td class="footable-visible footable-last-column">Internet Explorer 4.5</td>
                                    <td class="" style="display: none;">Mac OS 8-9</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">X</td>
                                </tr>
                                <tr class="gradeC footable-even" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Tasman</td>
                                    <td class="footable-visible footable-last-column">Internet Explorer 5.1</td>
                                    <td class="" style="display: none;">Mac OS 7.6-9</td>
                                    <td class="center" style="display: none;">1</td>
                                    <td class="center" style="display: none;">C</td>
                                </tr>
                                <tr class="gradeC footable-odd" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Tasman</td>
                                    <td class="footable-visible footable-last-column">Internet Explorer 5.2</td>
                                    <td class="" style="display: none;">Mac OS 8-X</td>
                                    <td class="center" style="display: none;">1</td>
                                    <td class="center" style="display: none;">C</td>
                                </tr>
                                <tr class="gradeA footable-even" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Misc</td>
                                    <td class="footable-visible footable-last-column">NetFront 3.1</td>
                                    <td class="" style="display: none;">Embedded devices</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">C</td>
                                </tr>
                                <tr class="gradeA footable-odd" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Misc</td>
                                    <td class="footable-visible footable-last-column">NetFront 3.4</td>
                                    <td class="" style="display: none;">Embedded devices</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">A</td>
                                </tr>
                                <tr class="gradeX footable-even" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Misc</td>
                                    <td class="footable-visible footable-last-column">Dillo 0.8</td>
                                    <td class="" style="display: none;">Embedded devices</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">X</td>
                                </tr>
                                <tr class="gradeX footable-odd" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Misc</td>
                                    <td class="footable-visible footable-last-column">Links</td>
                                    <td class="" style="display: none;">Text only</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">X</td>
                                </tr>
                                <tr class="gradeX footable-even" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Misc</td>
                                    <td class="footable-visible footable-last-column">Lynx</td>
                                    <td class="" style="display: none;">Text only</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">X</td>
                                </tr>
                                <tr class="gradeC footable-odd" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Misc</td>
                                    <td class="footable-visible footable-last-column">IE Mobile</td>
                                    <td class="" style="display: none;">Windows Mobile 6</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">C</td>
                                </tr>
                                <tr class="gradeC footable-even" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Misc</td>
                                    <td class="footable-visible footable-last-column">PSP browser</td>
                                    <td class="" style="display: none;">PSP</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">C</td>
                                </tr>
                                <tr class="gradeU footable-odd" style="display: none;">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Other browsers</td>
                                    <td class="footable-visible footable-last-column">All others</td>
                                    <td class="" style="display: none;">-</td>
                                    <td class="center" style="display: none;">-</td>
                                    <td class="center" style="display: none;">U</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5" class="footable-visible">
                                        <ul class="pagination float-right"><li class="footable-page-arrow disabled"><a data-page="first" href="#first">«</a></li><li class="footable-page-arrow disabled"><a data-page="prev" href="#prev">‹</a></li><li class="footable-page active"><a data-page="0" href="#">1</a></li><li class="footable-page"><a data-page="1" href="#">2</a></li><li class="footable-page"><a data-page="2" href="#">3</a></li><li class="footable-page"><a data-page="3" href="#">4</a></li><li class="footable-page"><a data-page="4" href="#">5</a></li><li class="footable-page-arrow"><a data-page="next" href="#next">›</a></li><li class="footable-page-arrow"><a data-page="last" href="#last">»</a></li></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
               <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>
@endsection

