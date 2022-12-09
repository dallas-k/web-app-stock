const fs = require('fs')

const dataBuffer = fs.readFileSync('stock.json')
const dataJSON = dataBuffer.toString()

console.log(dataJSON);