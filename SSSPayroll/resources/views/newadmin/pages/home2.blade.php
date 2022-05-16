@extends('newadmin.layouts.default')
@section('content')

<style>
			/** Start: to style navigation tab **/
			.nav {
			  margin-bottom: 18px;
			  margin-left: 0;
			  list-style: none;
			}

			.nav > li > a {
			  display: block;
			}
			
			.nav-tabs{
			  *zoom: 1;
			}

			.nav-tabs:before,
			.nav-tabs:after {
			  display: table;
			  content: "";
			}

			.nav-tabs:after {
			  clear: both;
			}

			.nav-tabs > li {
			  float: left;
			}

			.nav-tabs > li > a {
			  padding-right: 12px;
			  padding-left: 12px;
			  margin-right: 2px;
			  line-height: 14px;
			}

			.nav-tabs {
			  border-bottom: 1px solid #ddd;
			}

			.nav-tabs > li {
			  margin-bottom: -1px;
			}

			.nav-tabs > li > a {
			  padding-top: 8px;
			  padding-bottom: 8px;
			  line-height: 18px;
			  border: 1px solid transparent;
			  -webkit-border-radius: 4px 4px 0 0;
				 -moz-border-radius: 4px 4px 0 0;
					  border-radius: 4px 4px 0 0;
			}

			.nav-tabs > li > a:hover {
			  border-color: #eeeeee #eeeeee #dddddd;
			}

			.nav-tabs > .active > a,
			.nav-tabs > .active > a:hover {
			  color: #fff;
			  cursor: default;
			  background-color: #bc0003;
			  border: 1px solid #bc0003;
			  border-bottom-color: transparent;
			}
			
			li {
			  line-height: 18px;
			}
			
			.tab-content.active{
				display: block;
			}
			
			.tab-content.hide{
				display: none;
			}
			
			
			/** End: to style navigation tab **/
		</style>
<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Welcome {{ Session::get('name') }}!</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
    <div class="col-sm-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Attendance Summary</h5>
                </div>
                <div class="card-body" style="position: relative;padding:0;">
                    <div id="donut-chart" style="min-height: 400px;">
                        <div id="apexcharts3ubybc9o" class="apexcharts-canvas apexcharts3ubybc9o apexcharts-theme-light" style="width: 258px;height: 310px;">
                            <svg id="SvgjsSvg2868" width="339" height="400" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                <foreignObject x="0" y="180" width="339" height="400">
                                    <div class="apexcharts-legend apexcharts-align-center position-right" xmlns="http://www.w3.org/1999/xhtml" style="position: absolute;left: auto;top: 24px;/* right: 5px; */">
                                        <div class="apexcharts-legend-series" rel="1" seriesname="seriesx1" data:collapsed="false" style="margin: 2px 5px;">
                                            <span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(0, 143, 251) !important; color: rgb(0, 143, 251); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span>
                                            <span class="apexcharts-legend-text" rel="1" i="0" data:default-text="series-1" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">series-1</span>
                                        </div>
                                        <div class="apexcharts-legend-series" rel="2" seriesname="seriesx2" data:collapsed="false" style="margin: 2px 5px;">
                                            <span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgb(0, 227, 150) !important; color: rgb(0, 227, 150); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span>
                                            <span class="apexcharts-legend-text" rel="2" i="1" data:default-text="series-2" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">series-2</span>
                                        </div>
                                        <div class="apexcharts-legend-series" rel="3" seriesname="seriesx3" data:collapsed="false" style="margin: 2px 5px;">
                                            <span class="apexcharts-legend-marker" rel="3" data:collapsed="false" style="background: rgb(254, 176, 25) !important; color: rgb(254, 176, 25); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span>
                                            <span class="apexcharts-legend-text" rel="3" i="2" data:default-text="series-3" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">series-3</span>
                                        </div>
                                        <div class="apexcharts-legend-series" rel="4" seriesname="seriesx4" data:collapsed="false" style="margin: 2px 5px;">
                                            <span class="apexcharts-legend-marker" rel="4" data:collapsed="false" style="background: rgb(255, 69, 96) !important; color: rgb(255, 69, 96); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span>
                                            <span class="apexcharts-legend-text" rel="4" i="3" data:default-text="series-4" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">series-4</span>
                                        </div>
                                    </div>

                                </foreignObject>
                                <g id="SvgjsG2870" class="apexcharts-inner apexcharts-graphical" transform="translate(22, 0)">
                                    <defs id="SvgjsDefs2869">
                                        <clipPath id="gridRectMask3ubybc9o">
                                            <rect id="SvgjsRect2872" width="210" height="352" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMask3ubybc9o">
                                            <rect id="SvgjsRect2873" width="208" height="354" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <filter id="SvgjsFilter2882" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                            <feFlood id="SvgjsFeFlood2883" flood-color="#000000" flood-opacity="0.45" result="SvgjsFeFlood2883Out" in="SourceGraphic"></feFlood>
                                            <feComposite id="SvgjsFeComposite2884" in="SvgjsFeFlood2883Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite2884Out"></feComposite>
                                            <feOffset id="SvgjsFeOffset2885" dx="1" dy="1" result="SvgjsFeOffset2885Out" in="SvgjsFeComposite2884Out"></feOffset>
                                            <feGaussianBlur id="SvgjsFeGaussianBlur2886" stdDeviation="1 " result="SvgjsFeGaussianBlur2886Out" in="SvgjsFeOffset2885Out"></feGaussianBlur>
                                            <feMerge id="SvgjsFeMerge2887" result="SvgjsFeMerge2887Out" in="SourceGraphic">
                                                <feMergeNode id="SvgjsFeMergeNode2888" in="SvgjsFeGaussianBlur2886Out"></feMergeNode>
                                                <feMergeNode id="SvgjsFeMergeNode2889" in="[object Arguments]"></feMergeNode>
                                            </feMerge>
                                            <feBlend id="SvgjsFeBlend2890" in="SourceGraphic" in2="SvgjsFeMerge2887Out" mode="normal" result="SvgjsFeBlend2890Out"></feBlend>
                                        </filter>
                                        <filter id="SvgjsFilter2895" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                            <feFlood id="SvgjsFeFlood2896" flood-color="#000000" flood-opacity="0.45" result="SvgjsFeFlood2896Out" in="SourceGraphic"></feFlood>
                                            <feComposite id="SvgjsFeComposite2897" in="SvgjsFeFlood2896Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite2897Out"></feComposite>
                                            <feOffset id="SvgjsFeOffset2898" dx="1" dy="1" result="SvgjsFeOffset2898Out" in="SvgjsFeComposite2897Out"></feOffset>
                                            <feGaussianBlur id="SvgjsFeGaussianBlur2899" stdDeviation="1 " result="SvgjsFeGaussianBlur2899Out" in="SvgjsFeOffset2898Out"></feGaussianBlur>
                                            <feMerge id="SvgjsFeMerge2900" result="SvgjsFeMerge2900Out" in="SourceGraphic">
                                                <feMergeNode id="SvgjsFeMergeNode2901" in="SvgjsFeGaussianBlur2899Out"></feMergeNode>
                                                <feMergeNode id="SvgjsFeMergeNode2902" in="[object Arguments]"></feMergeNode>
                                            </feMerge>
                                            <feBlend id="SvgjsFeBlend2903" in="SourceGraphic" in2="SvgjsFeMerge2900Out" mode="normal" result="SvgjsFeBlend2903Out"></feBlend>
                                        </filter>
                                        <filter id="SvgjsFilter2908" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                            <feFlood id="SvgjsFeFlood2909" flood-color="#000000" flood-opacity="0.45" result="SvgjsFeFlood2909Out" in="SourceGraphic"></feFlood>
                                            <feComposite id="SvgjsFeComposite2910" in="SvgjsFeFlood2909Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite2910Out"></feComposite>
                                            <feOffset id="SvgjsFeOffset2911" dx="1" dy="1" result="SvgjsFeOffset2911Out" in="SvgjsFeComposite2910Out"></feOffset>
                                            <feGaussianBlur id="SvgjsFeGaussianBlur2912" stdDeviation="1 " result="SvgjsFeGaussianBlur2912Out" in="SvgjsFeOffset2911Out"></feGaussianBlur>
                                            <feMerge id="SvgjsFeMerge2913" result="SvgjsFeMerge2913Out" in="SourceGraphic">
                                                <feMergeNode id="SvgjsFeMergeNode2914" in="SvgjsFeGaussianBlur2912Out"></feMergeNode>
                                                <feMergeNode id="SvgjsFeMergeNode2915" in="[object Arguments]"></feMergeNode>
                                            </feMerge>
                                            <feBlend id="SvgjsFeBlend2916" in="SourceGraphic" in2="SvgjsFeMerge2913Out" mode="normal" result="SvgjsFeBlend2916Out"></feBlend>
                                        </filter>
                                        <filter id="SvgjsFilter2921" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                            <feFlood id="SvgjsFeFlood2922" flood-color="#000000" flood-opacity="0.45" result="SvgjsFeFlood2922Out" in="SourceGraphic"></feFlood>
                                            <feComposite id="SvgjsFeComposite2923" in="SvgjsFeFlood2922Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite2923Out"></feComposite>
                                            <feOffset id="SvgjsFeOffset2924" dx="1" dy="1" result="SvgjsFeOffset2924Out" in="SvgjsFeComposite2923Out"></feOffset>
                                            <feGaussianBlur id="SvgjsFeGaussianBlur2925" stdDeviation="1 " result="SvgjsFeGaussianBlur2925Out" in="SvgjsFeOffset2924Out"></feGaussianBlur>
                                            <feMerge id="SvgjsFeMerge2926" result="SvgjsFeMerge2926Out" in="SourceGraphic">
                                                <feMergeNode id="SvgjsFeMergeNode2927" in="SvgjsFeGaussianBlur2925Out"></feMergeNode>
                                                <feMergeNode id="SvgjsFeMergeNode2928" in="[object Arguments]"></feMergeNode>
                                            </feMerge>
                                            <feBlend id="SvgjsFeBlend2929" in="SourceGraphic" in2="SvgjsFeMerge2926Out" mode="normal" result="SvgjsFeBlend2929Out"></feBlend>
                                        </filter>
                                    </defs>
                                    <g id="SvgjsG2874" class="apexcharts-pie">
                                        <g id="SvgjsG2875" transform="translate(0, 0) scale(1)">
                                            <circle id="SvgjsCircle2876" r="60.7829268292683" cx="102" cy="102" fill="transparent"></circle>
                                            <g id="SvgjsG2877" class="apexcharts-slices">
                                                <g id="SvgjsG2878" class="apexcharts-series apexcharts-pie-series" seriesname="seriesx1" rel="1" data:realindex="0">
                                                    <path id="SvgjsPath2879" d="M 102 8.487804878048777 A 93.51219512195122 93.51219512195122 0 0 1 193.82766925207906 119.66945942174385 L 161.6879850138514 113.4851486241335 A 60.7829268292683 60.7829268292683 0 0 0 102 41.2170731707317 L 102 8.487804878048777 z" fill="rgba(0,143,251,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="100.89171974522293" data:startangle="0" data:strokewidth="2" data:value="44" data:pathorig="M 102 8.487804878048777 A 93.51219512195122 93.51219512195122 0 0 1 193.82766925207906 119.66945942174385 L 161.6879850138514 113.4851486241335 A 60.7829268292683 60.7829268292683 0 0 0 102 41.2170731707317 L 102 8.487804878048777 z" stroke="#ffffff"></path>
                                                </g>
                                                <g id="SvgjsG2891" class="apexcharts-series apexcharts-pie-series" seriesname="seriesx2" rel="2" data:realindex="1">
                                                    <path id="SvgjsPath2892" d="M 193.82766925207906 119.66945942174385 A 93.51219512195122 93.51219512195122 0 0 1 33.60242065014356 165.76756052732432 L 57.54157342259331 143.44891434276082 A 60.7829268292683 60.7829268292683 0 0 0 161.6879850138514 113.4851486241335 L 193.82766925207906 119.66945942174385 z" fill="rgba(0,227,150,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="126.11464968152865" data:startangle="100.89171974522293" data:strokewidth="2" data:value="55" data:pathorig="M 193.82766925207906 119.66945942174385 A 93.51219512195122 93.51219512195122 0 0 1 33.60242065014356 165.76756052732432 L 57.54157342259331 143.44891434276082 A 60.7829268292683 60.7829268292683 0 0 0 161.6879850138514 113.4851486241335 L 193.82766925207906 119.66945942174385 z" stroke="#ffffff"></path>
                                                </g>
                                                <g id="SvgjsG2904" class="apexcharts-series apexcharts-pie-series" seriesname="seriesx3" rel="3" data:realindex="2">
                                                    <path id="SvgjsPath2905" d="M 33.60242065014356 165.76756052732432 A 93.51219512195122 93.51219512195122 0 0 1 43.17510856532129 29.307752929049286 L 63.763820567458836 54.750039403882035 A 60.7829268292683 60.7829268292683 0 0 0 57.54157342259331 143.44891434276082 L 33.60242065014356 165.76756052732432 z" fill="rgba(254,176,25,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-2" index="0" j="2" data:angle="94.01273885350315" data:startangle="227.00636942675158" data:strokewidth="2" data:value="41" data:pathorig="M 33.60242065014356 165.76756052732432 A 93.51219512195122 93.51219512195122 0 0 1 43.17510856532129 29.307752929049286 L 63.763820567458836 54.750039403882035 A 60.7829268292683 60.7829268292683 0 0 0 57.54157342259331 143.44891434276082 L 33.60242065014356 165.76756052732432 z" stroke="#ffffff"></path>
                                                </g>
                                                <g id="SvgjsG2917" class="apexcharts-series apexcharts-pie-series" seriesname="seriesx4" rel="4" data:realindex="3">
                                                    <path id="SvgjsPath2918" d="M 43.17510856532129 29.307752929049286 A 93.51219512195122 93.51219512195122 0 0 1 101.98367904312639 8.487806302320948 L 101.98939137803215 41.21707409650861 A 60.7829268292683 60.7829268292683 0 0 0 63.763820567458836 54.750039403882035 L 43.17510856532129 29.307752929049286 z" fill="rgba(255,69,96,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-3" index="0" j="3" data:angle="38.980891719745216" data:startangle="321.0191082802547" data:strokewidth="2" data:value="17" data:pathorig="M 43.17510856532129 29.307752929049286 A 93.51219512195122 93.51219512195122 0 0 1 101.98367904312639 8.487806302320948 L 101.98939137803215 41.21707409650861 A 60.7829268292683 60.7829268292683 0 0 0 63.763820567458836 54.750039403882035 L 43.17510856532129 29.307752929049286 z" stroke="#ffffff"></path>
                                                </g>
                                                <g id="SvgjsG2880" class="apexcharts-datalabels"><text id="SvgjsText2881" font-family="Helvetica, Arial, sans-serif" x="161.4825588532264" y="52.871888324932726" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-text apexcharts-pie-label" filter="url(#SvgjsFilter2882)" style="font-family: Helvetica, Arial, sans-serif;">28.0%</text></g>
                                                <g id="SvgjsG2893" class="apexcharts-datalabels"><text id="SvgjsText2894" font-family="Helvetica, Arial, sans-serif" x="123.33069383900366" y="176.14005438919042" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-text apexcharts-pie-label" filter="url(#SvgjsFilter2895)" style="font-family: Helvetica, Arial, sans-serif;">35.0%</text></g>
                                                <g id="SvgjsG2906" class="apexcharts-datalabels"><text id="SvgjsText2907" font-family="Helvetica, Arial, sans-serif" x="25.04156501241738" y="96.60134750632659" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-text apexcharts-pie-label" filter="url(#SvgjsFilter2908)" style="font-family: Helvetica, Arial, sans-serif;">26.1%</text></g>
                                                <g id="SvgjsG2919" class="apexcharts-datalabels"><text id="SvgjsText2920" font-family="Helvetica, Arial, sans-serif" x="76.25974189413381" y="29.27321485773747" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff" class="apexcharts-text apexcharts-pie-label" filter="url(#SvgjsFilter2921)" style="font-family: Helvetica, Arial, sans-serif;">10.8%</text></g>
                                            </g>
                                        </g>
                                    </g>
                                    
                                    
                                </g>
                                <g id="SvgjsG2871" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-tooltip apexcharts-theme-dark">
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 143, 251);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 227, 150);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 3;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(254, 176, 25);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 4;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 69, 96);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                <ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1">Leave Balance</a>
				</li>
				<li>
					<a href="#tab2">Personal Details</a>
				</li>
				<li>
					<a href="#tab3">Family Details</a>
				</li>
                <li>
					<a href="#tab4">Service History</a>
				</li>
                <li>
					<a href="#tab5">EPA</a>
				</li>
                <li>
					<a href="#tab6" id="showRequests">Requests</a>
				</li>
               
			   </ul>
               <ul class="nav nav-tabs" id="requestTabs" style="display: none;">
				<li class="active" id="leaveApplication">
					<a href="#tab6">Leave Application</a>
				</li>
				<li>
					<a href="#tab7">Outdoor Application</a>
				</li>
				<li>
					<a href="#tab8">Attendance Application</a>
				</li>
                <li>
					<a href="#tab9">Comp Off Application</a>
				</li>
              
			   </ul>
            <section id="tab1" class="tab-content active">
			<div>
            <div class="row filter-row" style="padding-top: 16px;">
                <div class="col-sm-6 col-md-6">
                    <div class="form-group form-focus">
                        <h4>Leave Balance</h4>
                        <p>FY 20-21</p>
                    </div>
                </div>
            </div>
            <!-- Company List Starts-->
            <div id="leaveBalanceTable">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Leave Short Name</th>
                                        <th>Leave Name</th>
                                        <th>Leave Balance</th>
                                        <th>Expires</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <tr>
                                        <td>1</td>
                                        <td>EL</td>
                                        <td>Earned Leave</td>
                                        <td>11</td>
                                        <td>31-12-2021</td>
                                        <td><a href="">Apply</a></td>

                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>CL</td>
                                        <td>Casual Leave</td>
                                        <td>8</td>
                                        <td>31-12-2021</td>
                                        <td><a href="">Apply</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>SL</td>
                                        <td>Sick Leave</td>
                                        <td>5</td>
                                        <td>31-12-2021</td>
                                        <td><a href="">Apply</a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>COF</td>
                                        <td>Comp Off</td>
                                        <td>3</td>
                                        <td>31-10-2021</td>
                                        <td><a href="">Apply</a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			</div>
		</section>
		<section id="tab2" class="tab-content hide" style="padding-top: 0;">
			<div>
            <div class="row filter-row" style="padding-bottom: 16px;">
            <div class="col-auto float-right ml-auto">
            <button form="company" class="btn btn-info map w-100" type="submit">Save</button>
            </div>
            </div>
            <form id="company" enctype="multipart/form-data" method="post">
            @csrf
            <div class="faq-card">
                <div class="card">
                <div class="card-header">
                <h4 class="card-title">
                <a class="collapsed" data-toggle="collapse" href="#collapseOne">Personal Details</a>
                </h4>
                </div>
                <div id="collapseOne" class="card-collapse collapse show">
                <div class="card-body">
               <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Name in Documents<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" required="required" placeholder="Enter Name as on Documents">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Pan Card No. <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" required="required" placeholder="Enter Pan Card no.">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Adhaar Number <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter Adhaar Number" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Blood Group<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    </select> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Primary Mobile<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter Primary Mobile Number" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Alt. Mobile </label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter Alternate Mobile Number">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Primary Email <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="email" placeholder="Enter Email Id" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Secondary Email</label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="email" placeholder="Enter Secondary Email Id">
                    </div>
                   </div>
                </div>
                </div>
                </div>
                </div>
            </div>
                <div class="faq-card">
                <div class="card">
                <div class="card-header">
                <h4 class="card-title">
                <a class="collapsed" data-toggle="collapse" href="#collapseTwo">Permanent Address</a>
                </h4>
                </div>
                <div id="collapseTwo" class="card-collapse collapse show">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Line 1<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter House no./flat/office" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Line 2<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter street/locality/society" required="required">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Pin Code<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter Pin Code" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>City<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="city">city</option>
                    </select> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>State<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="state">State</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Country<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="India">India</option>
                    </select> 
                    </div>
                   </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="faq-card">
                <div class="card">
                <div class="card-header">
                <h4 class="card-title">
                <a class="collapsed" data-toggle="collapse" href="#collapseThree">Correspondence Address</a>
                </h4>
                </div>
                <div id="collapseThree" class="card-collapse collapse show">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                    <div class="form-group">
                    <label>Same As Permanent Address</label>
                    </div>
                    </div>
                    <div class="col-sm-1">
                    <div class="form-group">
                    <input type="checkbox" id="1" name="1">
                    </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Line 1<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter House no./flat/office" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Line 2<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter street/locality/society" required="required">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Pin Code<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter Pin Code" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>City<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="city">city</option>
                    </select> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>State<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="state">State</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Country<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="India">India</option>
                    </select> 
                    </div>
                   </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="faq-card">
                <div class="card">
                <div class="card-header">
                <h4 class="card-title">
                <a class="collapsed" data-toggle="collapse" href="#collapseFour">Emergency Contact</a>
                </h4>
                </div>
                <div id="collapseFour" class="card-collapse collapse show">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                    <div class="form-group">
                    <label>Same As Permanent Address</label>
                    </div>
                    </div>
                    <div class="col-sm-1">
                    <div class="form-group">
                    <input type="checkbox" id="1" name="1">
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-group">
                    <label>Same As Correspondance Address</label>
                    </div>
                    </div>
                    <div class="col-sm-1">
                    <div class="form-group">
                    <input type="checkbox" id="1" name="1">
                    </div>
                    </div>               
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Name<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Name" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Relation<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Relation with the emergency contact" required="required">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Mobile Number<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter Mobile Number" required="required"> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Address<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Address" required="required">
                    </div>
                   </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                
            </form>
			</div>
		</section>
		<section id="tab3" class="tab-content hide">
			<div>
            <div class="row filter-row" style="padding-top: 16px;">
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
                <h4 style="text-decoration: underline;">Family Details</h4>
            </div>
        </div>
   <div class="col-auto float-right ml-auto">
       <button form="company" class="btn btn-info map w-100" style="margin-left: 19px;" type="submit"><i class="la la-plus"></i> &nbsp;Add Another Family Member</button>
    </div>
    </div>
            <form id="company" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label> Relation <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="father">Father</option>
                    <option value="mother">Mother</option>
                    <option value="brother">Brother</option>
                    <option value="sister">Sister</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Occupation <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" required="required" placeholder="Enter Type of Occupation" value="Self Employed">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Name" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>D.O.B <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="date" placeholder="Enter date of birth" required="required">
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Gender <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Dependent <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    </select> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Nominee <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="yes">Yes</option>
                    <option value="no ">No</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Nominee % <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="number" placeholder="Enter nominee %" required="required" value="100">
                    </div>
                   </div>
                </div>
                
            </form>
			</div>
		</section>
        <section id="tab4" class="tab-content hide">
			<div>
            <div class="row filter-row" style="padding-top: 16px;">
        <div class="col-sm-6 col-md-6">  
            <div class="form-group form-focus">
                <h4 style="text-decoration: underline;">Service History</h4>
            </div>
        </div>
   <div class="col-auto float-right ml-auto">
       <p>Notice Period: 45 Days</p>
    </div>
    </div>
            <form id="company" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row" style="width: 105%;">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                        <label> Date of Joining <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="date" placeholder="Enter date of joining" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Employment Status <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required" id="status">
                    <option value="confirmed">Confirmed</option>
                    <option value="onNotice">On Notice</option>
                    </select> 
                    </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Confirmation Date <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="date" placeholder="Enter Date Of Confirmation" required="required">
                    </div>
                    </div>
                   
                </div>
                <div id="noticePeriod" style="display: none;">
                 <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Date of Resign <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="date" placeholder="Enter Date Of Resign" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Last Working Day <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="date" placeholder="Last working day" required="required">
                    </div>
                    </div>
                 </div>
                </div>
            </form>
			</div>
		</section>
        <section id="tab5" class="tab-content hide">
			<div>
				Content in tab 5
			</div>
		</section>
        <section id="tab6" class="tab-content hide">
			<div>
            <div class="row filter-row" style="padding-top: 16px;">
            <div class="col-auto float-right ml-auto">

                </div>
                </div>
            <form id="company" enctype="multipart/form-data" method="post">
            @csrf
              <div class="row">
                <div class="col-sm-2" id="labelCol1">
                <div class="form-group">
                    <label>Leave From <span class="text-danger">*</span></label>
                </div>
                </div>
                <div class="col-sm-4">
                <div class="form-group">
                <input class="form-control" type="date" placeholder="Enter Leaves taken from" required="required">
                </div>
                </div>
                <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                <div class="form-group">
                <label>Leave Till<span class="text-danger">*</span></label>
                </div>
                </div>
                <div class="col-sm-4">
                <div class="form-group">
                <input class="form-control" type="date" placeholder="Enter leaves till" required="required">
                </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Leave Type <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="casual leave">CL</option>
                    <option value="earned leave">EL</option>
                    <option value="paid leave">PL</option>
                    </select> 
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Duration<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <select class="form-control" required="required">
                    <option value="full day">Full Day</option>
                    <option value="half day">Half Day</option>
                    </select> 
                    </div>
                    </div>
                   
                </div>
                 <div class="row" style="width: 98%;">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Leave reason <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-10">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Leave Reason" required="required">
                    </div>
                    </div>
                 </div>
              
            </form>
            <div id="leaveBalanceTable">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Leave From</th>
                                        <th>Leave Till</th>
                                        <th>Leave Type</th>
                                        <th>Status</th>
                                        <th>Duration</th>
                                        <th>Reason</th>  
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <tr>
                                        <td>1</td>
                                        <td>01-12-2021</td>
                                        <td>04-12-2021</td>
                                        <td>EL</td>
                                        <td>Pending</td>
                                        <td>Full Day</td>
                                        <td><textarea disabled>Personal Work</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>03-12-2021</td>
                                        <td>05-12-2021</td>
                                        <td>CL</td>
                                        <td>Cancelled</td>
                                        <td>Half Day</td>
                                        <td><textarea disabled>Personal Work</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>01-12-2021</td>
                                        <td>02-12-2021</td>
                                        <td>PL</td>
                                        <td>Approved</td>
                                        <td>Full Day</td>
                                        <td><textarea disabled>Personal Work</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>21-12-2021</td>
                                        <td>25-12-2021</td>
                                        <td>PL</td>
                                        <td>Rejected</td>
                                        <td>Half Day</td>
                                        <td><textarea disabled>Personal Work</textarea></td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			</div>
		</section>
        <section id="tab7" class="tab-content hide">
			<div>
            <div class="row filter-row" style="padding-top: 16px;">
            <div class="col-auto float-right ml-auto">

                </div>
                </div>
            <form id="company" enctype="multipart/form-data" method="post">
            @csrf
              <div class="row">
                <div class="col-sm-2" id="labelCol1">
                <div class="form-group">
                    <label>Date of Outdoor <span class="text-danger">*</span></label>
                </div>
                </div>
                <div class="col-sm-4">
                <div class="form-group">
                <input class="form-control" type="date" placeholder="Enter Leaves taken from" required="required">
                </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>In Time: <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="time" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Out Time<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="time" required="required">
                    </div>
                    </div>
                   
                </div>
                 <div class="row" style="width: 98%;">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Remark<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-10">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Outdoor Remark" required="required">
                    </div>
                    </div>
                 </div>
              
            </form>
            <div id="leaveBalanceTable">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Date</th>
                                        <th>In Time</th>
                                        <th>Out Time</th>
                                        <th>Status</th>
                                        <th>Remarks</th> 
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <tr>
                                        <td>1</td>
                                        <td>01-12-2021</td>
                                        <td>09:30</td>
                                        <td>18:30</td>
                                        <td>Pending</td>
                                        <td><textarea disabled>This is the remark</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>01-12-2021</td>
                                        <td>09:30</td>
                                        <td>18:30</td>
                                        <td>Cancelled</td>
                                        <td><textarea disabled>This is the remark</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>01-12-2021</td>
                                        <td>09:30</td>
                                        <td>18:30</td>
                                        <td>Approved</td>
                                        <td><textarea disabled>This is the remark</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>21-12-2021</td>
                                        <td>09:30</td>
                                        <td>17:30</td>
                                        <td>Rejected</td>
                                        <td><textarea disabled>This is the remark</textarea></td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			</div>
		</section>
        <section id="tab8" class="tab-content hide">
			<div>
            <div class="row filter-row" style="padding-top: 16px;">
            <div class="col-auto float-right ml-auto">

                </div>
                </div>
            <form id="company" enctype="multipart/form-data" method="post">
            @csrf
              <div class="row">
                <div class="col-sm-2" id="labelCol1">
                <div class="form-group">
                    <label>Date of Rectification <span class="text-danger">*</span></label>
                </div>
                </div>
                <div class="col-sm-4">
                <div class="form-group">
                <input class="form-control" type="date" required="required">
                </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>In Time: <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="time" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Out Time<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="time" required="required">
                    </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>New In Time: <span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="time" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>New Out Time<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="time" required="required">
                    </div>
                    </div>
                   
                </div>
                
                 <div class="row" style="width: 98%;">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Remark<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-10">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Attendance Application Remark" required="required">
                    </div>
                    </div>
                 </div>
              
            </form>
            <div id="leaveBalanceTable">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Date</th>
                                        <th>In Time</th>
                                        <th>Out Time</th>
                                        <th style="width: 50px;">New In Time</th>
                                        <th style="width:50px;">New Out Time</th>
                                        <th>Status</th>
                                        <th>Remarks</th> 
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <tr>
                                        <td>1</td>
                                        <td>01-12-2021</td>
                                        <td>09:30</td>
                                        <td>--:--</td>
                                        <td>09:30</td>
                                        <td>18:30</td>
                                        <td>Pending</td>
                                        <td><textarea disabled>This is the remark</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>01-12-2021</td>
                                        <td>--:--</td>
                                        <td>18:30</td>
                                        <td>09:30</td>
                                        <td>18:30</td>
                                        <td>Cancelled</td>
                                        <td><textarea disabled>This is the remark</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>01-12-2021</td>
                                        <td>--:--</td>
                                        <td>18:30</td>
                                        <td>09:30</td>
                                        <td>18:30</td>
                                        <td>Approved</td>
                                        <td><textarea disabled>This is the remark</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>01-12-2021</td>
                                        <td>--:--</td>
                                        <td>18:30</td>
                                        <td>09:30</td>
                                        <td>18:30</td>
                                        <td>Rejected</td>
                                        <td><textarea disabled>This is the remark</textarea></td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			</div>
		</section>
        <section id="tab9" class="tab-content hide">
			<div>
            <div class="row filter-row" style="padding-top: 16px;">
            <div class="col-auto float-right ml-auto">

                </div>
                </div>
            <form id="company" enctype="multipart/form-data" method="post">
            @csrf
              
                <div class="row">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Date Of Request<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="date" required="required">
                    </div>
                    </div>
                    <div class="col-sm-2" id="labelCol1" style="text-align:center;">
                    <div class="form-group">
                    <label>Against Date<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                    <input class="form-control" type="date" required="required">
                    </div>
                    </div>
                   
                </div>
                 <div class="row" style="width: 98%;">
                    <div class="col-sm-2" id="labelCol1">
                    <div class="form-group">
                    <label>Remark<span class="text-danger">*</span></label>
                    </div>
                    </div>
                    <div class="col-sm-10">
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter Comp Off Remark" required="required">
                    </div>
                    </div>
                 </div>
              
            </form>
            <div id="leaveBalanceTable">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Date Of Request</th>
                                        <th>Against Date</th>
                                        <th>Status</th>
                                        <th>Remarks</th> 
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <tr>
                                        <td>1</td>
                                        <td>01-12-2021</td>
                                        <td>30-11-2021</td>
                                        <td>Pending</td>
                                        <td><textarea disabled>This is the remark</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>01-12-2021</td>
                                        <td>30-11-2021</td>
                                        <td>Approved</td>
                                        <td><textarea disabled>This is the remark</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>01-12-2021</td>
                                        <td>30-11-2021</td>
                                        <td>Pending</td>
                                        <td><textarea disabled>This is the remark</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>01-12-2021</td>
                                        <td>30-11-2021</td>
                                        <td>Rejected</td>
                                        <td><textarea disabled>This is the remark</textarea></td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			</div>
		</section>
                    
                </div>
            </div>
        </div>
    </div>

</div>

<!-- /Page Content -->
<script>
 $(document).ready(function() {
		$('.nav-tabs > li > a').click(function(event){
		event.preventDefault();//stop browser to take action for clicked anchor
					
		//get displaying tab content jQuery selector
		var active_tab_selector = $('.nav-tabs > li.active > a').attr('href');					
					
		//find actived navigation and remove 'active' css
		var actived_nav = $('.nav-tabs > li.active');
		actived_nav.removeClass('active');
					
		//add 'active' css into clicked navigation
		$(this).parents('li').addClass('active');
					
		//hide displaying tab content
		$(active_tab_selector).removeClass('active');
		$(active_tab_selector).addClass('hide');
					
		//show target tab content
		var target_tab_selector = $(this).attr('href');
		$(target_tab_selector).removeClass('hide');
		$(target_tab_selector).addClass('active');
	     });
	
    $('#status').on('change', function() {
      if ( this.value == 'onNotice')
      {
        $("#noticePeriod").show();
      }
      else
      {
        $("#noticePeriod").hide();
      }
    });
    $(document).ready(function() {
       $('#showRequests').click(function() {
                $('#requestTabs').show();
                $('#leaveApplication').addClass('active');
        });
        $('#requestTabs').hide();
    });
});
</script>
@stop
