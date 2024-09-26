const Vet = require('../models/vetModel');

const vetController = {
    createVet: (req, res) => {
        const newVet = {
            vetname: req.body.vetname,
            nomeDono: req.body.nomeDono,
            cnpj: req.body.cnpj,
            telefone: req.body.telefone,
            email: req.body.email,
            rua: req.body.rua,
            numero: req.body.numero,
            bairro: req.bodt.bairro,
            cidade: req.body.cidade,
            uf: req.body.uf,
            cep: req.body.cep,
            pais: req.body.pais,
            user: req.body.user,
            password: req.body.password,
        };

        Vet.create(newVet, (err, vetId) => {
            if (err) {
                return res.status(500).json({ error: err });
            }
            res.redirect('/vets');
        });
    },

    getVetById: (req, res) => {
        const vetId = req.params.id;

        Vet.findById(vetId, (err, vet) => {
            if (err) {
                return res.status(500).json({ error: err });
            }
            if (!vet) {
                return res.status(404).json({ message: 'Vet not found' });
            }
            res.render('vets/show', { vet });
        });
    },

    getAllVets: (req, res) => {
        Vet.getAll((err, vets) => {
            if (err) {
                return res.status(500).json({ error: err });
            }
            res.render('vets/index', { vets });
        });
    },

    renderCreateForm: (req, res) => {
        res.render('vets/create');
    },

    renderEditForm: (req, res) => {
        const vetId = req.params.id;

        Vet.findById(vetId, (err, vet) => {
            if (err) {
                return res.status(500).json({ error: err });
            }
            if (!vet) {
                return res.status(404).json({ message: 'Vet not found' });
            }
            res.render('vets/edit', { vet });
        });
    },

    updateVet: (req, res) => {
        const vetId = req.params.id;
        const updatedVet = {
            vetname: req.body.vetname,
            nomeDono: req.body.nomeDono,
            cnpj: req.body.cnpj,
            telefone: req.body.telefone,
            email: req.body.email,
            rua: req.body.rua,
            numero: req.body.numero,
            bairro: req.bodt.bairro,
            cidade: req.body.cidade,
            uf: req.body.uf,
            cep: req.body.cep,
            pais: req.body.pais,
            user: req.body.user,
            password: req.body.password,
            
        };

        Vet.update(vetId, updatedVet, (err) => {
            if (err) {
                return res.status(500).json({ error: err });
            }
            res.redirect('/vets');
        });
    },

    deleteVet: (req, res) => {
        const vetId = req.params.id;

        Vet.delete(vetId, (err) => {
            if (err) {
                return res.status(500).json({ error: err });
            }
            res.redirect('/vets');
        });
    },
};

module.exports = vetController;

