const fs = require('fs');

const stock = {
    "idx" : 1,
    "date" : "12/09",
    "name" : "samsung",
    "price" : 60000,
    "category" : "domestic"
}

const stockJSON = JSON.stringify(stock);

fs.writeFileSync('stock.json',stockJSON);