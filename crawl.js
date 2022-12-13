// axios - 특정 웹사이트 페이지 내용을 가져오기
// cheerio - HTML 구조를 가지고 있는 일반 텍스트를, 자바스크립트에서 document 객체의 내장함수를 사용해서 html 요소에 접근하는 것과 유사한 함수를 제공

const axios = require('axios');
const cheerio = require('cheerio');

const naverFinance = 'https://finance.naver.com/marketindex';

const getHTML = async (url) => {
    try {
        const html = await axios.get(url);
        return html.data;
    } catch(e) {console.log(e)};
}

const parsing = async (page) => {
    const $ = cheerio.load(page);
    const courses = [];
    const $courseList = $(".market1");

    $courseList.each((idx,node) => {
        const title = $(node).find('.h_1st:eq(0)').text();
        console.log(title);
        return title;
    })
}

const getValue = async (url) => {
    const html = await getHTML(url);
    const courses = await parsing(html);
    console.log(courses);
}

getValue(naverFinance);