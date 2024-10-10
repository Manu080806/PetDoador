const express = require('express');
const petController = require('../controllers/petControllers');
const router = express.Router();

router.get('/', petController.getAllPets);
router.get('/:id', petController.getPetById);
router.get('/:id/edit', petController.renderEditForm);
router.put('/:id', petController.updatePet);
router.delete('/:id', petController.deletePet);

module.exports = router;

