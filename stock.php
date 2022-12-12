<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stock.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('#menu_tab_btn').on('click', () => {
                $('.menu_tab').animate({width:'toggle'},400);
                $('.menu_tab li').toggle();
                $('#main').on('click',() => {
                    $('.menu_tab').css({display : 'none'});
                    $('.menu_tab li').css({display : 'none'})
                })}
        )})
    </script>
    <title>주재파악</title>
</head>
<body>
    <div class="container">
        <header class="header" id="header">
            <h1 class="hidden">주재파악</h1>
            <div class="header_menu">
                <i id='menu_tab_btn' class="bi bi-list fs-4"></i>
                <p>S&P 1555 (+0.00) 0.0%</p>
                <p>달러 1322 (+0.00) 0.0%</p>
            </div>
            <div class="menu_tab bg-secondary">
                <ul>
                    <li><a>주식 관리</a></li>
                    <li><a>포트폴리오</a></li>
                    <li><a>재무제표</a></li>
                    <li><a>주요경제 지표</a></li>
                </ul>
            </div>
        </header>
        <main class="main" id="main">
            <div class="category_btn mb-3">
                <button class="btn btn-warning">전체</button>
                <button class="btn btn-warning">주식</button>
                <button class="btn btn-warning">해외</button>
                <button class="btn btn-warning">채권</button>
                <button class="btn btn-warning">실물</button>
            </div>
            <div class="align_btn">
                <ul>
                    <li class="btn btn-secondary">날짜별
                        <ul class='align_updown' id="align_date">
                            <li>오름차순</li>
                            <li>내림차순</li>
                        </ul>
                    </li>
                    <li class="btn btn-secondary">이름별
                        <ul class="align_updown" id="align_name">
                            <li>오름차순</li>
                            <li>내림차순</li>
                        </ul>
                    </li>
                    <li class="btn btn-secondary">금액별
                        <ul class="align_updown" id="align_price">
                            <li>오름차순</li>
                            <li>내림차순</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <table class="stock-list table mb-5">
                <thead>
                    <tr>
                        <th>날짜</th>
                        <th>이름</th>
                        <th>가격</th>
                        <th>수량</th>
                        <th>총 매입금액</th>
                        <th>포지션 정리</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                // Local JSON 파일 읽어오기

                $url ='stock.json';

                if(!file_exists($url)) {
                    echo '파일이 없습니다.';
                    exit;
                }

                $json_string = file_get_contents($url);
                $R = json_decode($json_string, true);
                // json_decode : JSON 문자열을 PHP 배열로 바꾼다
                // json_decode 함수의 두번째 인자를 true 로 설정하면 무조건 array로 변환된다.
                // $R : array data

                // 자료 파싱처리
                for ($i = 0; $i < count($R); $i++){
                    foreach($R[$i] as $key => $value){
                ?>
                    <tr>
                        <td class='col-2'><?php echo $value['date']?></td>
                        <td class='col-2'><?php echo $value['name']?></td>
                        <td class='col-2'><?php echo $value['price']?></td>
                        <td class='col-1'><?php echo $value['num']?></td>
                        <td class='col-2'><?php echo $value['price']*$value['num']?></td>
                        <td class='col-3 num_change'><button class='btn btn-danger' onclick="changeNum(this.parentNode,<?php echo $value['idx']?>, <?php echo $value['num']?>)">수정</button></td>
                    </tr>
                <?php }}?>
                </tbody>
            </table>
            <button class="btn btn-dark" data-bs-toggle='modal' data-bs-target='#addModal'>
                <i class="bi bi-patch-plus"></i>
                추가하기
            </button>
        </main>
    </div>
    <div class="modal fade" tabindex="-1" id="addModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">주식 추가하기</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            
                <form action="form/addStock.php" method="get">
                    <div class="modal-body">
                        <table class="add-list table">
                            <tr>
                                <th class="col-auto"><label class='form-label' for="">날짜</label></th>
                                <th class="col-auto"><label class='form-label' for="">종목명</label></th>
                                <th class="col-auto"><label class='form-label' for="">매입가</label></th>
                                <th class="col-auto"><label class='form-label' for="">수량</label></th>
                                <th class="col-auto"><label class='form-label' for="">카테고리</label></th>
                            </tr>
            
                            <tr>
                                <td><input class='form-control form-control-sm' type="text" name="date"></td>
                                <td><input class='form-control form-control-sm' type="text" name="name"></td>
                                <td><input class='form-control form-control-sm' type="text" name="price"></td>
                                <td><input class='form-control form-control-sm' type="text" name="count"></td>
                                <td><select class='form-select form-select-sm' name="category">
                                        <option value="kor_stock">국내주식</option>
                                        <option value="for_stock">해외주식</option>
                                        <option value="bond">채권ETF</option>
                                        <option value="real">실물ETF</option>
                                    </select>
                                </td>
                            </tr>
            
                        </table>
                    </div>
            
                    <div class="modal-footer">
                        <button class="btn btn-dark"><i class="bi bi-patch-plus"></i>행 추가</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function changeNum(node, idx, num){
            node.innerHTML = `<span><i onclick='numMinus(${node},${num})' class="bi bi-dash-circle num_minus"></i> ${num} <button onclick='submitNum(${node}, ${idx}, ${num})' class='btn btn-danger' style='font-size:0.5rem'>적용</button></span>`;
            console.log(node);
        }
        function numMinus(node, num){
            
        }
        function submitNum(){
            
        }
    </script>
</body>
</html>