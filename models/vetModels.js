const db = require('../config/db');

const Vet = {
    createVet: (vet, callback) => {
        const query = 'INSERT INTO vets (vetname, nomeDono, cnpj, telefone, email, rua, numero, bairro, cidade, uf, cep, pais, user, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )';
        db.query(query, [vet.vetname, vet.nomeDono,vet.cnpj,vet.telefone,vet.email,vet.rua,vet.numero,vet.bairro,vet.cidade,vet.uf,vet.cep,vet.pais,vet.user,vet.password], (err, results) => {
            if (err) {
                return callback(err);
            }
            callback(null, results.insertId);
        });
    },

    findById: (id, callback) => {
        const query = 'SELECT * FROM vets WHERE id = ?';
        db.query(query, [id], (err, results) => {
            if (err) {
                return callback(err);
            }
            callback(null, results[0]);
        });
    },

    findByVetname: (vetname, callback) => {
        const query = 'SELECT * FROM vets WHERE petname = ?';
        db.query(query, [vetname], (err, results) => {
            if (err) {
                return callback(err);
            }
            callback(null, results[0]);
        });
    },

    updateVet: (id, vet, callback) => {
        const query = 'UPDATE vets SET vetname = ?, nomeDono = ?, cnpj = ?, telefone = ?, email = ?, rua = ?, numero = ?, bairro = ?, cidade = ?, uf = ?, cep = ?, pais = ?, user = ?, password = ? WHERE id = ?';
        db.query(query, [vet.vetname, vet.nomeDono, vet.cnpj, vet.telefone, vet.email, vet.rua, vet.numero, vet.bairro, vet.cidade, vet.uf, vet.cep, vet.pais, vet.user, vet.password], (err, results) => {
            if (err) {
                return callback(err);
            }
            callback(null, results);
        });
    },

    deleteVet: (id, callback) => {
        const query = 'DELETE FROM vets WHERE id = ?';
        db.query(query, [id], (err, results) => {
            if (err) {
                return callback(err);
            }
            callback(null, results);
        });
    },

    getAllVets: (callback) => {
        const query = 'SELECT * FROM vets';
        db.query(query, (err, results) => {
            if (err) {
                return callback(err);
            }
            callback(null, results);
        });
    },
};


module.exports = Vet;

