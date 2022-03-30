<?php require('../check_login_admin.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;1,300&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Dashboard</title>
</head>
<body>
    <div class="container">

    <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <!-- <span class="icon"><ion-icon name="home"></ion-icon></span> -->
                        <span class="title">ADMIN</span>
                    </a>
                </li>
                <li>
                    <a href="../category/Category.php">
                        <span class="icon"><ion-icon name="list"></ion-icon></span>
                        <span class="title">Danh mục</span>
                    </a>
                </li>
                <li>
                    <a href="../product/Product.php">
                        <span class="icon"><ion-icon name="cube"></ion-icon></span>
                        <span class="title">Sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="../root/index.php">
                        <span class="icon"><ion-icon name="analytics"></ion-icon></span>
                        <span class="title">Trang chính</span>
                    </a>
                </li>
                <li>
                    <a href="../order/order.php">
                        <span class="icon"><ion-icon name="cash"></ion-icon></span>
                        <span class="title">Đơn hàng</span>
                    </a>
                </li>
                <li>
                    <a href="../user/user.php">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <span class="title">Nhân Viên</span>
                    </a>
                </li>
                <li>
                    <a href="../logout_admin.php">
                        <span class="icon"><ion-icon name="log-out"></ion-icon></span>
                        <span class="title">Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- main -->

        <div class="main">
            <?php include("../topBar.php") ?>
            <div class="content">
            <?php  
                require('../connect/connect.php');
                $date = 10;
                $sql ="SELECT DATE_FORMAT(created_at,'%e-%m')as'ngay' ,sum(total_money)as 'doanh_thu'
                         from 
                            `order` 
                         WHERE 
                            status = 1 
                            and DATE(created_at) >= CURDATE() - INTERVAL $date DAY 
                        GROUP by DATE_FORMAT(created_at,'%e-%m')";
                $result = mysqli_query($connect,$sql);
                $arr =[];
                $today = date('d');
                if($today < $date)
                {
                    $get_day_last_month= $date -$today;
                    $last_month = date('m',strtotime("-1 month"));
                    $last_month_date = date('Y-m-d',strtotime("-1 month"));
                    $final_day_last_month= (new DateTime($last_month_date)) -> format('t');
                    $start_day_last_month =  $final_day_last_month - $get_day_last_month;
                                   
                    for($i = $start_day_last_month;$i <=  $final_day_last_month ;$i++)
                    {   
                        $key = $i.'-'.$last_month;
                        $arr[$key] = 0;
                    
                    }
                    $start_day_this_month =1;
                }
                else{
                    $start_day_this_month = $today - $date ;
                }
                $this_month=date('m');
                

                for($i = $start_day_this_month;$i <= $today  ;$i++)
                {   
                    $key = $i.'-'.$this_month;
                    $arr[$key] = 0;
                  
                }
               
                foreach($result as $each)
                {
                    $arr[$each['ngay']]= (float)$each['doanh_thu'];
                
                }
                $arrX = array_keys($arr);
         
                $arrY =  array_values($arr);
           ?>

            <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description hide">
                    Basic line chart showing trends in a dataset. This chart includes the
                    <code>series-label</code> module, which adds a label to each line for
                    enhanced readability.
                </p>
            </figure>
            
            </div>
        </div>
        </div>

        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        
        <!-- js highchart -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script type="text/javascript">
             Highcharts.chart('container', {

                title: {
                text: 'Thống kê doanh thu trong <?php echo $date ?> ngày gần đây'
                },

                xAxis: {
                categories: <?php echo json_encode($arrX) ?>
                },

                legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
                },

                plotOptions: {
                series: {
                    label: {
                    connectorAllowed: false
                    },

                }
                },

                series: [{
                name: 'Doanh thu',
                data: <?php echo json_encode($arrY) ?>
                }],

                responsive: {
                rules: [{
                    condition: {
                    maxWidth: 500
                    },
                    chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                    }
                }]
                }

                });
        </script>
        <!-- end chart -->
        <script src="../js/main.js"></script>
</body>
</html>