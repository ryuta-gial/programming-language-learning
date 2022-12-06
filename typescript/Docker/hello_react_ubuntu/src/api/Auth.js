//ローカルのダミーIDとPASS
export async function verifyLogin({ userid, password }) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (userid === 'shimizu' && password === 'p') {
                resolve();
            } else {
                reject();
            }
        }, 1000);
    });
}