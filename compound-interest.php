<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/compound.css">
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
                })})
            $('#i_button').click( ()=>{
                $('#i_result').css({"display":'block'})
            })
        })
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
        <main id="main" class="main">
            <button class='select_btn btn btn-light'>거치식</button>
            <button class='select_btn btn btn-light'>적립식</button>
            <div class='row'>
                <div class='installment col-md-6'>
                        <div>
                            <label for="origin">투자원금</label>
                            <input type="text" name='i_origin' id='i_origin'>
                        </div>
                        <div>
                            <label for="option">계산기간</label>
                            <input type="text" name='i_range' id='i_range'>
                            <select name="i_option" id='i_option'>
                                <option value="day">일</option>
                                <option value="month">개월</option>
                            </select>
                        </div>
                        <div>
                            <label for="get">목표수익률</label>
                            <input type="text" name='i_get' id='i_get'> %
                        </div>
                        <button id='i_button' onclick='calc()'>계산</button>
                    <div id='i_result'>
                        <table id='i_table'>
                            <tr>
                                <th>기간</th>
                                <th>수익금</th>
                                <th>합산 금액</th>
                                <th>수익률</th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class='accumulate col-md-6'>
                    <div>
                        <label for="">투자원금</label>
                        <input type="text">
                    </div>
                    <div>
                        <label for="">계산기간</label>
                        <input type="text">
                        <select name="" id="">
                            <option value="">일</option>
                            <option value="">개월</option>
                        </select>
                    </div>
                    <div>
                        <label for="">추가금액</label>
                        <input type="text">
                    </div>
                    <div>
                        <label for="">목표수익률</label>
                        <input type="text">%
                    </div>
                    <button>계산</button>
                </div>
            </div>
        </main>
        <footer id='footer' class="footer">
            <div class="row">
                <ul class="footer_menu bg-warning">
                    <li><a href=""><div><i class="bi bi-bell"></i></div>알림</a></li>
                    <li><a href=""><div><i class="bi bi-building"></i></div>My자산</a></li>
                    <li><a href=""><div><i class="bi bi-piggy-bank"></i></div>복리 계산기</a></li>
                    <li><a href=""><div><i class="bi bi-calculator"></i></div>대출 계산기</a></li>
                </ul>
            </div>
        </footer>
    </div>
    <script>
        // 서비스워커 등록
        // if('serviceWorker' in navigator) {
        //     navigator.serviceWorker
        //     .register('./root/service_worker.js')
        //     .then( () => console.log('service_worker registered'))
        // }

        // button
        function calc(){
            let i_origin, i_range, i_option, i_getm, origin;
            i_origin = Number(document.getElementById('i_origin').value);
            i_range = Number(document.getElementById('i_range').value);
            i_option = Number(document.getElementById('i_option').value);
            i_get = Number(document.getElementById('i_get').value);
            origin = i_origin;

            let result =
            `<table id='i_table' class='table table-striped'>
              <tr>
                <th class='col-2'>기간</th>
                <th class='col-4'>수익</th>
                <th class='col-4'>총금액</th>
                <th class='col-2'>수익률</th>
              </tr>`
            document.getElementById('i_result').innerHTML = result;

            const table = document.getElementById('i_table');
            
            for(let i = 0; i < i_range; i++){
                let profit = origin * i_get / 100;
                origin += profit;
                let percent = origin / i_origin * 100;
                let profit_f = profit.toFixed(0);
                let origin_f = origin.toFixed(0);
                
                const newRow = table.insertRow();

                const newCell1 = newRow.insertCell(0);
                const newCell2 = newRow.insertCell(1);
                const newCell3 = newRow.insertCell(2);
                const newCell4 = newRow.insertCell(3);

                newCell1.innerText = i+1;
                newCell2.innerText = profit_f; //toLocaleString('ko-KR');
                newCell3.innerText = origin_f; //toLocaleString('ko-KR');
                newCell4.innerText = percent.toFixed(2) + '%';
            }
            document.getElementById('i_result').display = 'block';
        }
        //     let i_origin, i_range, i_option, i_get;
        //     i_origin = document.getElementById('i_origin').value;
        //     i_range = document.getElementById('i_range').value;
        //     i_option = document.getElementById('i_option').value;
        //     i_get = document.getElementById('i_get').value;

        //     let result =
        //     `<table>
        //       <tr>
        //         <th>기간</th>
        //         <th>수익</th>
        //         <th>총금액</th>
        //         <th>수익률</th>
        //       </tr>`
        //     document.getElementById('i_result').innerHTML += result;
        //     for(let i = 1; i < i_range; i++){
        //         let profit = i_origin * i_get / 100;
        //         let origin = i_origin + profit;
        //         let percent = origin / i_origin; 
        //         document.getElementById('i_result').innerHTML += `<tr>
        //           <td>${i}</td>
        //           <td>${profit}</td>
        //           <td>${origin}</td>
        //           <td>${percent}</td>
        //         </tr>`
        //         i++;
        //         origin += profit;
        //     }
        //     document.getElementById('i_result').innerHTML += '</table>'
        // }
    </script>
</body>
</html>