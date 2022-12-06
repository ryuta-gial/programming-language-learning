const { Pool } = require('pg');
//const Pool = PG.Pool;
const connection = new Pool({
    user: 'yama',
    host: '127.0.0.1',
    database: 'hello_database',
    password: 'yama',
    port: 5432,
});
const getMerchants = () => {
    return new Promise(function(resolve, reject) {
    connection.query('SELECT * FROM login ORDER BY id ASC', (error, results) => {
        if (error) {
        reject(error)
        }
        resolve(results);
    })
    })
}
//今後のための参考に色々なSQL記述しておく
const loginMerchants = (body) => {
    return new Promise(function(resolve, reject) {
        const { user_id:name, user_pass:pass } = body
        //console.log(pass);
        connection.query('SELECT * FROM login WHERE idname = $1 AND pass = $2 ', [name, pass],  (error, results) => {
        if (error) {
            reject(error)
        } else if (results.rows.length === 0) {
            reject(error)
        }
        else {
            console.log(results.rows.length)
            resolve(results.rows);
            //resolve(results.rows);
        }
    })
    })
}
const createMerchant = (body) => {
    return new Promise(function(resolve, reject) {
    const { name, email } = body

    connection.query('INSERT INTO merchants (name, email) VALUES ($1, $2) RETURNING *', [name, email], (error, results) => {
    if (error) {
        reject(error)
    }
    resolve(`A new merchant has been added added: ${JSON.stringify(results.rows[0])}`)
    })
    })
}
const deleteMerchant = (merchantId) => {
    return new Promise(function(resolve, reject) {
    const id = parseInt(merchantId)

    connection.query('DELETE FROM merchants WHERE id = $1', [id], (error, results) => {
    if (error) {
        reject(error)
    }
    resolve(`Merchant deleted with ID: ${id}`)
    })
    })
}

module.exports = {
    getMerchants,
    loginMerchants,
    createMerchant,
    deleteMerchant,
}
