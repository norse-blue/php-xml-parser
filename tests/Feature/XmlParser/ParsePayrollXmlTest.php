<?php


namespace NorseBlue\Xmlify\Tests\Feature\XmlParser;


use function NorseBlue\Xmlify\Tests\asset_file_get_contents;
use function NorseBlue\Xmlify\Tests\asset_path;
use NorseBlue\Xmlify\Tests\TestCase;
use NorseBlue\Xmlify\Xml;

class ParsePayrollXmlTest extends TestCase
{
    /** @var string The asset file with which to run the tests */
    protected $file = 'payroll.xml';

    /** @var string The file path */
    protected $path;

    /** @var string The XML file content */
    protected $xml_content;

    /** @var array The parsed array */
    protected $parsed_array;

    public function setUp(): void
    {
        $this->path = asset_path($this->file);
        $this->xml_content = asset_file_get_contents($this->file);
        $this->parsed_array = [
            '@attributes' => [
                'Version' => '3.3',
                'Serie' => 'A',
                'Folio' => '00',
                'Fecha' => '2017-06-20T15:36:11',
                'Sello' => 'qsXEDQgqWUyqfsVXhO4OhgXojuwQeBydKJXjoFUEDV/b4jTJGjj/jUFs69+KDMqaNHUWz3cZGWIhMVTKMBpMHpqPa+vU25Fs406hTUgph0THbsNGXu8GDxw8AsP++Ko9ABnMF3paUDEXDrbHSXwmlX3O6X234EAy+KGWBi13CuA=',
                'FormaPago' => '03',
                'NoCertificado' => '61200000200000010002',
                'Certificado' => 'MIIEMTCCAxmgAwIBAgIUMjAwMDEwMDAwMDAyMDAwMDAyMTYwDQYJKoZIhvcNAQEFBQAwggFcMRowGAYDVQQDDBFBLkMuIDIgZGUgcHJ1ZWJhczEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSkwJwYJKoZIhvcNAQkBFhphc2lzbmV0QHBydWViYXMuc2F0LmdvYi5teDEmMCQGA1UECQwdQXYuIEhpZGFsZ28gNzcsIENvbC4gR3VlcnJlcm8xDjAMBgNVBBEMBTA2MzAwMQswCQYDVQQGEwJNWDEZMBcGA1UECAwQRGlzdHJpdG8gRmVkZXJhbDESMBAGA1UEBwwJQ295b2Fjw6FuMTQwMgYJKoZIhvcNAQkCDCVSZXNwb25zYWJsZTogQXJhY2VsaSBHYW5kYXJhIEJhdXRpc3RhMB4XDTEyMTAyMzE3MTYzM1oXDTE2MTAyMzE3MTYzM1owgasxIDAeBgNVBAMUF0FOQSBDRUNJTElBIEdPTUVaIFlB0UVaMSAwHgYDVQQpFBdBTkEgQ0VDSUxJQSBHT01FWiBZQdFFWjEgMB4GA1UEChQXQU5BIENFQ0lMSUEgR09NRVogWUHRRVoxFjAUBgNVBC0TDUdPWUE3ODA0MTZHTTAxGzAZBgNVBAUTEkdPWUE3ODA0MTZNREZSTk4wOTEOMAwGA1UECxMFTGVudGUwgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBANE54X4JwhPUkVhaLN32fbVSUzrtl83qTdsKpUFIt0CpTg+8SVwLO1FPih+eQ9hvoPJPdyM601bwf+vLB3iRp6hHQKSMUB1MXjDuPvkrcKEf2LR/5gAN+aXdfmPQj9NlV47v7Yj0HY6PkSWytxsAgha3gaWr/uKzcCvkx7HQS1+zAgMBAAGjHTAbMAwGA1UdEwEB/wQCMAAwCwYDVR0PBAQDAgbAMA0GCSqGSIb3DQEBBQUAA4IBAQA6W3YebSopPcWQn6EY6Af0Xcalet2kC+7sL03OOQl+GhGvjRzMBLNbNAZEAyqCZ94fU2lvpHs6+dWcRh1byr4o9odCKFngxY2neGCjidZwWBmjRVwnd29TzSTfH62B0xcwfur9BgVAqRLBTUvQMe3n5IqXs/by1GNEjkkTK/Rkyjoc8UmIuqvLz4zb36jbFJljGzWlqucYTg1Lr/LlloQnsEFsujDNPEHr/IBHiQhKA604gl3gYaXqoX1XICwv1ZUUyBm0AJdhQdNeeCSpEHgiEObdz9caN54NG4dEaTCBBnx0PMPvZ5KQqMTs1w5uYGAAwmxZOdbKwZibrTC5HEie',
                'SubTotal' => '1096.45',
                'Descuento' => '26.91',
                'Moneda' => 'MXN',
                'Total' => '1069.54',
                'TipoDeComprobante' => 'N',
                'MetodoPago' => 'PUE',
                'LugarExpedicion' => '64000',
            ],
            'cfdi:Emisor' => [
                '@attributes' => [
                    'Rfc' => 'GOYA780416GM0',
                    'Nombre' => 'GG GG GG',
                    'RegimenFiscal' => '612',
                ],
            ],
            'cfdi:Receptor' => [
                '@attributes' => [
                    'Rfc' => 'GOYA780416GM0',
                    'Nombre' => 'GG GG GG',
                    'UsoCFDI' => 'G03',
                ],
            ],
            'cfdi:Conceptos' => [
                'cfdi:Concepto{0}' => [
                    '@attributes' => [
                        'ClaveProdServ' => '84111505',
                        'Cantidad' => '1',
                        'ClaveUnidad' => 'ACT',
                        'Descripcion' => 'Pago de nómina',
                        'ValorUnitario' => '1096.45',
                        'Importe' => '1096.45',
                        'Descuento' => '26.91',
                    ],
                ],
            ],
            'cfdi:Complemento' => [
                'nomina12:Nomina' => [
                    '@attributes' => [
                        'Version' => '1.2',
                        'FechaPago' => '2017-05-12',
                        'FechaInicialPago' => '2017-04-01',
                        'FechaFinalPago' => '2017-04-30',
                        'NumDiasPagados' => '7',
                        'TipoNomina' => 'O',
                        'TotalOtrosPagos' => '12.15',
                        'TotalDeducciones' => '26.91',
                        'TotalPercepciones' => '1084.30',
                    ],
                    'nomina12:Emisor' => [
                        '@attributes' => [
                            'RegistroPatronal' => 'REG12345PAT',
                        ],
                    ],
                    'nomina12:Receptor' => [
                        '@attributes' => [
                            'Curp' => 'CURP123456RECEPTOR',
                            'TipoContrato' => '01',
                            'TipoRegimen' => '02',
                            'NumEmpleado' => '1',
                            'PeriodicidadPago' => '04',
                            'ClaveEntFed' => 'MEX',
                            'NumSeguridadSocial' => '123456',
                            'Banco' => '012',
                            'FechaInicioRelLaboral' => '2017-01-01',
                            'Puesto' => 'Socio fundador',
                            'SalarioBaseCotApor' => '161.90',
                            'RiesgoPuesto' => '1',
                            'SalarioDiarioIntegrado' => '161.90',
                            'Antigüedad' => 'P3M29D',
                        ],
                    ],
                    'nomina12:Percepciones' => [
                        '@attributes' => [
                            'TotalGravado' => '1084.30',
                            'TotalExento' => '0.00',
                            'TotalSueldos' => '1084.30',
                        ],
                        'nomina12:Percepcion{0}' => [
                            '@attributes' => [
                                'TipoPercepcion' => '001',
                                'Clave' => '001',
                                'Concepto' => 'Sueldos Salarios Rayas y Jornales',
                                'ImporteGravado' => '1084.30',
                                'ImporteExento' => '0.00',
                            ],
                        ],
                    ],
                    'nomina12:Deducciones' => [
                        'nomina12:Deduccion{0}' => [
                            '@attributes' => [
                                'TipoDeduccion' => '001',
                                'Clave' => '042',
                                'Concepto' => 'Seguridad Social',
                                'Importe' => '26.91',
                            ],
                        ],
                    ],
                    'nomina12:OtrosPagos' => [
                        'nomina12:OtroPago{0}' => [
                            '@attributes' => [
                                'TipoOtroPago' => '002',
                                'Clave' => 'CACR',
                                'Concepto' => 'Subsidio',
                                'Importe' => '12.15',
                            ],
                            'nomina12:SubsidioAlEmpleo' => [
                                '@attributes' => [
                                    'SubsidioCausado' => '81.55',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    /** @test */
    public function it_parses_a_complex_xml_with_defaults()
    {
        $result = Xml::text($this->xml_content)
            ->parseRun()
            ->toArray();

        $this->assertEquals($this->parsed_array, $result);
    }
}
