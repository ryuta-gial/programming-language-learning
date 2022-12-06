import { Pool } from 'pg';
const connection = new Pool({
    user: 'yama',
    host: 'localhost',
    database: 'hello_database',
    password: 'yama',
    port: 5432,
});
const getMerchants = () => {
    return new Promise(function (resolve, reject) {
        connection.query('SELECT * FROM login ORDER BY id ASC', (error, results) => {
            if (error) {
                reject(error);
            }
            resolve(results.rows);
        });
    });
};
//今後のための参考に色々なSQL記述しておく
const loginMerchants = (body: { user_id: string; user_pass: string })  => {
    return new Promise(function (resolve, reject) {
        const { user_id: name, user_pass: pass } = body;
        //console.log(pass);
        connection.query(
            'SELECT * FROM login WHERE idname = $1 AND pass = $2 ',
            [name, pass],
            (error, results) => {
                if (error) {
                    reject(error);
                } else if (results.rows.length === 0) {
                    reject(error);
                } else {
                    //console.log(results.rows.length)
                    resolve(results.rows);
                    //resolve(results.rows);
                }
            }
        );
    });
};

module.exports = {
    getMerchants,
    loginMerchants,
};
