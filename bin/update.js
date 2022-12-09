const fs = require('fs')

const dataBuffer = fs.readFileSync('stock.json')
const dataJSON = dataBuffer.toString()
const stock = JSON.parse(dataJSON)

stock.name = 'hynix';
stock.price = '80000';

const stockJSON = JSON.stringify(stock);

fs.writeFileSync('stock.json',stockJSON);