const express = require('express');
const vetController = require('../controllers/vetControllers');
const router = express.Router();

router.get('/', vetController.getAllVets);
router.get('/:id', vetController.getVetById);
router.get('/:id/edit', vetController.renderEditForm);
router.put('/:id', vetController.updateVet);
router.delete('/:id', vetController.deleteVet);

module.exports = router;
