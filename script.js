const { createPool } = require('mysql')

const pool = createPool({
    host: "localhost",
    user: "root",
    password: "Group13@website",
    connectionLimit: 10
})
pool.query('SELECT * FROM usersdb.word;', (err, res) => {
    return console.log(res[0].img) /*link img */
})
function show_image(src, width, height, alt) {
    var img = document.createElement("img");
    img.src = src;
    img.width = width;
    img.height = height;
    img.alt = alt;

    document.body.appendChild(img);
}
