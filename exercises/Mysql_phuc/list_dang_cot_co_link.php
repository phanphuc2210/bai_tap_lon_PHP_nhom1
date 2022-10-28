<?php # Script 3.4 - index.php
$page_title = 'Thông tin các sản phẩm dạng cột';
include ('../../includes/header.php');
?>
<style>
    #title {
        background-color: #ffeee4;
    }

    h2 {
        color: #fe6500;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th, td {
        padding: 4px 12px 4px 4px;
    }

    img {
        margin-top: 4px;
    }
</style>

<div class="d-flex">
    <?php 
    include ('../../includes/sidebar_exercises.html');
    ?>
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 7:</u> List dạng cột có link</a></h2>
        <!-- ================== Phần thay đổi nằm ở đây =========================== -->
        <?php 
        require_once "./connect.php";

        $sql = "SELECT sua.Ma_sua, sua.Ten_sua, sua.Hinh, hang_sua.Ten_hang_sua, loai_sua.Ten_loai,sua.Trong_luong,sua.Don_gia 
                FROM sua,hang_sua,loai_sua
                WHERE sua.Ma_hang_sua = hang_sua.Ma_hang_sua and sua.Ma_loai_sua = loai_sua.Ma_loai_sua
                ";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        $itemPerRow = 5;
        $maxRow = ceil($numRows/$itemPerRow);

        $mang = [];
        if($numRows!=0) {
            while($row = mysqli_fetch_array($result)){
                $mang[] = $row;
            }
        }
        ?>  

        <table class="mx-auto">
            <tr>
                <td colspan="<?php echo $itemPerRow; ?>" align="center" id="title"><h2>THÔNG TIN CÁC SẢN PHẨM</h2></td>
            </tr>
            
            <?php 
            if(count($mang)!=0) {
                for($i = 1; $i <= $maxRow; $i++) {
                    echo "<tr style='height: 150px'>";
                    for($j = ($i - 1)* $itemPerRow; $j < $itemPerRow*$i; $j++) {
                        if($j < $numRows) {
                            $hinh_anh = "../Hinh_sua/".$mang[$j]['Hinh'];
                            $linkToDetail = "./list_chi_tiet.php?ma=".$mang[$j]['Ma_sua']; 
                            echo "<td align='center' style='width: 180px'>
                                    <a href= $linkToDetail>
                                        <p class='fw-bold mb-0'>".$mang[$j]['Ten_sua']."</p>
                                    </a>
                                    <span>". $mang[$j]['Trong_luong'] . " gr - ". number_format($mang[$j]['Don_gia'], 0, '', '.') . " VNĐ" ."</span>
                                    <img src= $hinh_anh height='100px'/>
                                </td>";
                        } else {
                            echo "<td align='center' style='width: 160px'></td>";
                        }  
                    }
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</div>

<?php
include ('../../includes/footer.html');
?>