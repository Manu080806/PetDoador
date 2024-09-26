const express = require('express');
const petController = require('../controllers/petController');
const vetController = require('../controllers/vetController');
const router = express.Router();


router.get('/', petController.getAllUsers);
router.get('/:id', petController.getUserById);

router.get('/', vetController.getAllUsers);
router.get('/:id', vetController.getUserById);

module.exports = router;
