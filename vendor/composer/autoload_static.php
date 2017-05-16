<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit25298c762e41fca61dcbec1f8a9e5331
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hudutech\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hudutech\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Hudutech',
        ),
    );

    public static $classMap = array (
        'Hudutech\\AppInterface\\ClinicalNoteInterface' => __DIR__ . '/../..' . '/src/Hudutech/AppInterface/ClinicalNoteInterface.php',
        'Hudutech\\AppInterface\\ClinicalTestInterface' => __DIR__ . '/../..' . '/src/Hudutech/AppInterface/ClinicalTestInterface.php',
        'Hudutech\\AppInterface\\DrugInventoryInterface' => __DIR__ . '/../..' . '/src/Hudutech/AppInterface/DrugInventoryInterface.php',
        'Hudutech\\AppInterface\\DrugPrescriptionInterface' => __DIR__ . '/../..' . '/src/Hudutech/AppInterface/DrugPrescriptionInterface.php',
        'Hudutech\\AppInterface\\PatientClinicalTestInterface' => __DIR__ . '/../..' . '/src/Hudutech/AppInterface/PatientClinicalTestInterface.php',
        'Hudutech\\AppInterface\\PatientInterface' => __DIR__ . '/../..' . '/src/Hudutech/AppInterface/PatientInterface.php',
        'Hudutech\\AppInterface\\PatientVisitInterface' => __DIR__ . '/../..' . '/src/Hudutech/AppInterface/PatientVisitInterface.php',
        'Hudutech\\AppInterface\\ProductInventoryInterface' => __DIR__ . '/../..' . '/src/Hudutech/AppInterface/ProductInventoryInterface.php',
        'Hudutech\\AppInterface\\SalesInterface' => __DIR__ . '/../..' . '/src/Hudutech/AppInterface/SalesInterface.php',
        'Hudutech\\AppInterface\\UserInterface' => __DIR__ . '/../..' . '/src/Hudutech/AppInterface/UserInterface.php',
        'Hudutech\\Auth\\Auth' => __DIR__ . '/../..' . '/src/Hudutech/Auth/Auth.php',
        'Hudutech\\Controller\\ClinicalNoteController' => __DIR__ . '/../..' . '/src/Hudutech/Controller/ClinicalNoteController.php',
        'Hudutech\\Controller\\ClinicalTestController' => __DIR__ . '/../..' . '/src/Hudutech/Controller/ClinicalTestController.php',
        'Hudutech\\Controller\\DrugInventoryController' => __DIR__ . '/../..' . '/src/Hudutech/Controller/DrugInventoryController.php',
        'Hudutech\\Controller\\DrugPrescriptionController' => __DIR__ . '/../..' . '/src/Hudutech/Controller/DrugPrescriptionController.php',
        'Hudutech\\Controller\\PatientClinicalTestController' => __DIR__ . '/../..' . '/src/Hudutech/Controller/PatientClinicalTestController.php',
        'Hudutech\\Controller\\PatientController' => __DIR__ . '/../..' . '/src/Hudutech/Controller/PatientController.php',
        'Hudutech\\Controller\\PatientVisitController' => __DIR__ . '/../..' . '/src/Hudutech/Controller/PatientVisitController.php',
        'Hudutech\\Controller\\ProductInventoryController' => __DIR__ . '/../..' . '/src/Hudutech/Controller/ProductInventoryController.php',
        'Hudutech\\Controller\\SalesController' => __DIR__ . '/../..' . '/src/Hudutech/Controller/SalesController.php',
        'Hudutech\\Controller\\UserController' => __DIR__ . '/../..' . '/src/Hudutech/Controller/UserController.php',
        'Hudutech\\DBManager\\ComplexQuery' => __DIR__ . '/../..' . '/src/Hudutech/DBManager/ComplexQuery.php',
        'Hudutech\\DBManager\\DB' => __DIR__ . '/../..' . '/src/Hudutech/DBManager/DB.php',
        'Hudutech\\Entity\\ClinicalNote' => __DIR__ . '/../..' . '/src/Hudutech/Entity/ClinicalNote.php',
        'Hudutech\\Entity\\ClinicalTest' => __DIR__ . '/../..' . '/src/Hudutech/Entity/ClinicalTest.php',
        'Hudutech\\Entity\\DrugInventory' => __DIR__ . '/../..' . '/src/Hudutech/Entity/DrugInventory.php',
        'Hudutech\\Entity\\DrugPrescription' => __DIR__ . '/../..' . '/src/Hudutech/Entity/DrugPrescription.php',
        'Hudutech\\Entity\\Patient' => __DIR__ . '/../..' . '/src/Hudutech/Entity/Patient.php',
        'Hudutech\\Entity\\PatientClinicalTest' => __DIR__ . '/../..' . '/src/Hudutech/Entity/PatientClinicalTest.php',
        'Hudutech\\Entity\\PatientVisit' => __DIR__ . '/../..' . '/src/Hudutech/Entity/PatientVisit.php',
        'Hudutech\\Entity\\ProductInventory' => __DIR__ . '/../..' . '/src/Hudutech/Entity/ProductInventory.php',
        'Hudutech\\Entity\\Sales' => __DIR__ . '/../..' . '/src/Hudutech/Entity/Sales.php',
        'Hudutech\\Entity\\User' => __DIR__ . '/../..' . '/src/Hudutech/Entity/User.php',
        'Hudutech\\Security\\Encryption' => __DIR__ . '/../..' . '/src/Hudutech/Security/Encryption.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit25298c762e41fca61dcbec1f8a9e5331::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit25298c762e41fca61dcbec1f8a9e5331::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit25298c762e41fca61dcbec1f8a9e5331::$classMap;

        }, null, ClassLoader::class);
    }
}
