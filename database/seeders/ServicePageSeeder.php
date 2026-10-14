<?php

namespace Database\Seeders;

use App\Models\ServicePage;
use Illuminate\Database\Seeder;

class ServicePageSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->pages() as $page) {
            // firstOrCreate: seed defaults only when the page is missing, so admin edits are never overwritten by re-seeding.
            ServicePage::firstOrCreate(
                ['key' => $page['key']],
                [
                    'title'    => $page['title'],
                    'subtitle' => $page['subtitle'],
                    'blocks'   => json_encode($page['blocks']),
                    'body'     => $page['body'],
                ]
            );
        }
    }

    private function pages(): array
    {
        return [
            [
                'key'      => 'design',
                'title'    => 'Steel Structure Design Services',
                'subtitle' => 'Customized, practical and fabrication-friendly steel structure design for industrial, commercial and infrastructure projects.',
                'blocks'   => [
                    [
                        'image' => null,
                        'text'  => '<p>At Zahid Steel Limited, we provide professional and customized steel structure design solutions for industrial, commercial, and infrastructure projects. Our design approach combines structural safety, practical functionality, efficient material utilization, and fabrication requirements to deliver reliable and cost-effective solutions.</p><p>With our experience in steel construction and fabrication, we develop designs that are not only structurally sound but also practical for fabrication and erection.</p>',
                    ],
                    [
                        'image' => null,
                        'text'  => '<ul><li>PEB &amp; customized steel structure design</li><li>Structural design, analysis &amp; member sizing</li><li>Fabrication-friendly, detailed shop drawings</li><li>Integrated design-to-fabrication approach</li></ul><p class="svc-starline"><strong>Applications:</strong> Warehouses &#9733; Factories &#9733; Industrial Buildings &#9733; Commercial Facilities &#9733; PEB Structures</p>',
                    ],
                ],
                'body'     => <<<'HTML'
<h2>Our Design Services</h2>
<h3>PEB Design</h3>
<p>We provide complete Pre-Engineered Building (PEB) design solutions for warehouses, factories, industrial buildings, commercial facilities, and other applications. Our designs focus on structural efficiency, functionality, and ease of fabrication and erection.</p>
<h3>Structural Design &amp; Analysis</h3>
<p>Our structural design and analysis services cover steel structures and their major components. We consider structural loads, stability, member sizing, connections, and other engineering requirements to develop safe and efficient structural solutions.</p>
<h3>Industrial Building Design</h3>
<p>We design steel structures for various industrial applications, including manufacturing facilities, production plants, workshops, and other industrial buildings. Designs are developed according to project requirements, site conditions, and intended use.</p>
<h3>Warehouse &amp; Factory Design</h3>
<p>Our warehouse and factory design solutions are developed to maximize usable space while maintaining structural efficiency and operational requirements. We provide solutions for large-span warehouses, storage facilities, production areas, and industrial sheds.</p>
<h3>Shop &amp; Fabrication Drawings</h3>
<p>We prepare detailed shop and fabrication drawings required for manufacturing and assembling steel structures. These drawings provide essential information including dimensions, member details, connections, assemblies, and other fabrication requirements.</p>
<h3>Customized Steel Structure Design</h3>
<p>Every project has different requirements. We provide customized steel structure design solutions based on the client's project scope, architectural requirements, site conditions, functional needs, and budget considerations.</p>

<h2>From Design to Fabrication</h2>
<p>Our design process is closely connected with fabrication and construction. By considering fabrication and erection requirements during the design stage, we aim to minimize unnecessary complexity, improve material utilization, and support smooth project execution.</p>
<p class="svc-flowline">Design &rarr; Structural Analysis &rarr; Detailing &rarr; Fabrication &rarr; Erection</p>

<h2>Real Project-Based Design</h2>
<p>To demonstrate our capabilities, we showcase selected real project design drawings, 3D models and renders, structural calculation concepts, fabrication drawings, and photographs of completed structures. These project references provide a clear understanding of our design and engineering capabilities.</p>

<h2>Why Choose Our Design Services?</h2>
<ul>
<li>Project-Specific Solutions</li>
<li>Practical &amp; Fabrication-Friendly Designs</li>
<li>Structural Safety &amp; Efficiency</li>
<li>Detailed Shop &amp; Fabrication Drawings</li>
<li>Integrated Design-to-Fabrication Approach</li>
<li>Customized Solutions for Industrial &amp; Commercial Projects</li>
</ul>

<h2>Have a Steel Structure Project?</h2>
<p>Whether you need a PEB, warehouse, factory, industrial building, or customized steel structure, our team can help develop a practical design solution for your project.</p>
HTML,
            ],
            [
                'key'      => 'erection',
                'title'    => 'Steel Structure Erection Services',
                'subtitle' => 'Safe, precise and professional steel structure installation for industrial buildings, warehouses, factories and customized steel structures.',
                'blocks'   => [
                    [
                        'image' => null,
                        'text'  => '<p>Zahid Steel Limited provides professional steel structure erection and installation services for industrial buildings, warehouses, factories, commercial buildings, PEB structures, and customized steel projects.</p><p>Our experienced erection team focuses on proper assembly, structural alignment, bolted connections, installation accuracy, and site safety. All erection activities are carried out according to approved engineering drawings, project specifications, and site requirements.</p>',
                    ],
                    [
                        'image' => null,
                        'text'  => '<ul><li>Experienced erection team</li><li>Engineering-based installation</li><li>Accurate alignment &amp; bolted connections</li><li>Strong focus on site safety</li></ul><p class="svc-starline"><strong>Suitable Projects:</strong> Factories &#9733; Warehouses &#9733; Industrial Buildings &#9733; Steel Sheds &#9733; Commercial Buildings &#9733; PEB Structures</p>',
                    ],
                ],
                'body'     => <<<'HTML'
<h2>Our Steel Structure Erection Services</h2>
<h3>1. Steel Building Erection</h3>
<ul>
<li>PEB / Steel Building Erection</li>
<li>Industrial Building Installation</li>
<li>Warehouse &amp; Factory Structure Erection</li>
<li>Commercial Steel Structure Erection</li>
<li>Customized Steel Structure Installation</li>
</ul>
<h3>2. Structural Component Installation</h3>
<ul>
<li>Column &amp; Beam Installation</li>
<li>Roof &amp; Wall Frame Installation</li>
<li>Purlin &amp; Girt Installation</li>
<li>Bracing Installation</li>
<li>Steel Stair &amp; Platform Installation</li>
<li>Other Structural Steel Components</li>
</ul>
<h3>3. Structural Connection &amp; Alignment</h3>
<ul>
<li>High-Strength Bolt Connections</li>
<li>Structural Alignment</li>
<li>Level &amp; Plumb Checking</li>
<li>Anchor Bolt Position Verification</li>
<li>Structural Adjustment &amp; Correction</li>
<li>Final Connection Inspection</li>
</ul>
<h3>4. Roofing &amp; Cladding Installation</h3>
<ul>
<li>Roof Sheet Installation</li>
<li>Wall Cladding Installation</li>
<li>Insulation Installation</li>
<li>Flashing &amp; Trim Installation</li>
<li>Related Roofing Accessories</li>
</ul>

<h2>Our Erection Process</h2>
<p>We follow a systematic erection process to support safe and efficient project execution. Each stage is coordinated with the project drawings and site requirements to maintain installation accuracy and ensure smooth progress.</p>
<p class="svc-flowline">Site Preparation &rarr; Material Inspection &rarr; Column Installation &rarr; Beam &amp; Frame Assembly &rarr; Alignment &amp; Bolting &rarr; Roofing &amp; Cladding &rarr; Final Inspection</p>

<h2>Safety &amp; Quality Control</h2>
<p>Safety and quality are important parts of our erection activities. Our team follows appropriate site safety practices and performs necessary checks throughout the installation process.</p>
<ul>
<li>Proper Material &amp; Component Inspection</li>
<li>Accurate Structural Alignment</li>
<li>Secure Bolted Connections</li>
<li>Level &amp; Plumb Verification</li>
<li>Site Safety Practices</li>
<li>Quality Checks During Installation</li>
<li>Final Structural Inspection</li>
</ul>

<h2>Why Choose Zahid Steel Limited?</h2>
<ul>
<li>Experienced Erection Team</li>
<li>Engineering-Based Installation</li>
<li>Accurate Alignment &amp; Connections</li>
<li>Strong Focus on Site Safety</li>
<li>Quality-Controlled Execution</li>
<li>Project-Specific Installation Approach</li>
<li>Timely &amp; Efficient Project Execution</li>
<li>Integrated Design, Fabrication &amp; Erection Capability</li>
</ul>

<h2>From Fabrication to Final Installation</h2>
<p>With capabilities covering design, detailing, steel fabrication, and erection, Zahid Steel Limited can support projects through multiple stages of the steel construction process.</p>
<p class="svc-flowline">Design &rarr; Detailing &rarr; Fabrication &rarr; Transportation &rarr; Erection &rarr; Final Inspection</p>

<h2>Need Professional Steel Structure Erection?</h2>
<p>Contact Zahid Steel Limited for your next steel building, warehouse, factory, or PEB project.</p>
HTML,
            ],
            [
                'key'      => 'fabrication',
                'title'    => 'Steel Fabrication Services',
                'subtitle' => 'Precision fabrication. Reliable steel. Built for performance — with experience dating back to 1994.',
                'blocks'   => [
                    [
                        'image' => null,
                        'text'  => '<p>With experience dating back to 1994, Zahid Steel Limited provides professional steel fabrication solutions for industrial, commercial, warehouse, factory, and customized steel construction projects.</p><p>Our fabrication capabilities cover structural steel components, PEB structures, mezzanine systems, platforms, and other customized steel structures. We focus on fabrication accuracy, quality workmanship, and efficient project execution to meet the requirements of each project.</p>',
                    ],
                    [
                        'image' => null,
                        'text'  => '<ul><li>Experience since 1994</li><li>Quality-focused manufacturing process</li><li>Experienced &amp; skilled workforce</li><li>Design-to-fabrication capability</li></ul><p class="svc-starline"><strong>We Fabricate:</strong> PEB &#9733; Structural Steel &#9733; Trusses &#9733; Mezzanine Floors &#9733; Platforms &#9733; Customized Structures</p>',
                    ],
                ],
                'body'     => <<<'HTML'
<h2>Our Fabrication Process</h2>
<h3>1. Shop Drawing &amp; Detailing</h3>
<p>Fabrication begins with approved shop drawings and detailed fabrication plans to ensure every component is manufactured to the required specifications.</p>
<h3>2. Material Cutting</h3>
<p>Steel materials are accurately measured, marked, and cut according to approved drawings and cutting requirements.</p>
<h3>3. Fit-Up &amp; Assembly</h3>
<p>Cut components are properly positioned and assembled to ensure correct dimensions, geometry, and connection alignment before welding.</p>
<h3>4. Welding</h3>
<p>Qualified welding processes are used to join structural components according to approved drawings and applicable project requirements.</p>
<h3>5. Surface Treatment</h3>
<p>Depending on project specifications, fabricated components may undergo surface preparation, shot blasting, primer application, painting, or galvanizing.</p>
<h3>6. Quality Inspection</h3>
<p>Fabricated components are inspected for dimensions, alignment, weld quality, surface condition, and other applicable quality requirements.</p>
<h3>7. Packing &amp; Dispatch</h3>
<p>Completed and inspected components are identified, organized, packed, and prepared for safe transportation to the project site.</p>
<p class="svc-flowline">Shop Drawing &rarr; Cutting &rarr; Fit-Up &amp; Assembly &rarr; Welding &rarr; Surface Treatment &rarr; Quality Inspection &rarr; Packing &amp; Dispatch</p>

<h2>What We Fabricate</h2>
<ul>
<li>Structural Steel Structures</li>
<li>PEB (Pre-Engineered Building) Structures</li>
<li>Steel Columns &amp; Beams</li>
<li>Trusses</li>
<li>Purlins &amp; Girts</li>
<li>Mezzanine Floors</li>
<li>Steel Platforms</li>
<li>Steel Stairs</li>
<li>Bracing Systems</li>
<li>Customized Steel Structures</li>
</ul>

<h2>Factory Facilities &amp; Machinery</h2>
<p>Our fabrication facility is equipped with machinery and equipment designed to support efficient steel fabrication and project execution.</p>
<h3>Major Machinery &amp; Equipment</h3>
<ul>
<li>CNC / Automatic Cutting Machines</li>
<li>Plasma / Gas Cutting Equipment</li>
<li>Welding Machines</li>
<li>Drilling Machines</li>
<li>Plate &amp; Section Processing Equipment</li>
<li>Bending Equipment</li>
<li>Shot Blasting Equipment</li>
<li>Painting &amp; Surface Treatment Equipment</li>
<li>Material Handling Equipment</li>
</ul>

<h2>Quality Control &amp; Standards</h2>
<p>Quality control is an important part of our fabrication process. Our team performs necessary inspections throughout fabrication to ensure finished components meet approved drawings, project specifications, and applicable quality requirements.</p>
<ul>
<li>Raw Material Inspection</li>
<li>Dimensional Inspection</li>
<li>Fit-Up Inspection</li>
<li>Welding Quality Inspection</li>
<li>Surface Preparation Inspection</li>
<li>Coating / Paint Inspection</li>
<li>Final Fabrication Inspection</li>
<li>Material Test Reports &amp; Mill Certificates, where applicable</li>
</ul>

<h2>Why Choose Zahid Steel Limited?</h2>
<ul>
<li>Experience Since 1994</li>
<li>Professional Steel Fabrication</li>
<li>Project-Specific Fabrication Solutions</li>
<li>Quality-Focused Manufacturing Process</li>
<li>Experienced &amp; Skilled Workforce</li>
<li>Design-to-Fabrication Capability</li>
<li>Customized Steel Structures</li>
<li>Reliable Project Execution</li>
</ul>

<h2>From Design to Fabrication</h2>
<p>Our integrated capabilities allow us to support steel projects through multiple stages, helping maintain coordination between design, fabrication, and site requirements.</p>
<p class="svc-flowline">Design &rarr; Detailing &rarr; Fabrication &rarr; Surface Treatment &rarr; Quality Inspection &rarr; Delivery &rarr; Erection</p>

<h2>Ready to Start Your Steel Fabrication Project?</h2>
<p>Whether you need PEB structures, structural steel, warehouse components, mezzanine systems, platforms, or customized steel fabrication, Zahid Steel Limited can develop a solution according to your project requirements.</p>
HTML,
            ],
            [
                'key'      => 'supply',
                'title'    => 'Steel Products & Structural Material Supply',
                'subtitle' => 'Reliable steel products. Quality materials. Timely supply — serving projects across Bangladesh since 1994.',
                'blocks'   => [
                    [
                        'image' => null,
                        'text'  => '<p>With experience dating back to 1994, Zahid Steel Limited supplies a range of steel products and structural materials for industrial, commercial, construction, warehouse, and infrastructure projects.</p><p>We serve contractors, developers, industrial organizations, commercial businesses, and project-based clients, providing quality materials and project-focused supply solutions according to specific requirements.</p>',
                    ],
                    [
                        'image' => null,
                        'text'  => '<ul><li>Quality materials to project specifications</li><li>On-time, coordinated delivery</li><li>Competitive, project-focused pricing</li><li>Bulk order capacity</li></ul><p class="svc-starline"><strong>We Supply:</strong> Structural Steel &#9733; Roofing &amp; Cladding &#9733; Purlins &#9733; Racking &amp; Mezzanine &#9733; PEB Components</p>',
                    ],
                ],
                'body'     => <<<'HTML'
<h2>Our Steel Products &amp; Materials</h2>
<p>We supply a range of steel products and structural materials for different construction and industrial applications.</p>
<h3>Structural Steel</h3>
<ul>
<li>Steel Beams</li>
<li>Steel Columns</li>
<li>Angles</li>
<li>Channels</li>
<li>Steel Plates</li>
<li>Other Structural Steel Sections</li>
</ul>
<h3>Roofing &amp; Cladding Sheets</h3>
<ul>
<li>Roofing Sheets</li>
<li>Wall Cladding Sheets</li>
<li>Related Roofing Accessories</li>
<li>Flashing &amp; Trim Components</li>
</ul>
<h3>Purlins &amp; Accessories</h3>
<ul>
<li>C-Purlins</li>
<li>Z-Purlins</li>
<li>Bolts &amp; Nuts</li>
<li>Structural Fasteners</li>
<li>Other Related Accessories</li>
</ul>
<h3>Racking &amp; Mezzanine Systems</h3>
<ul>
<li>Heavy-Duty Pallet Racking</li>
<li>Industrial Storage Racks</li>
<li>Mezzanine Floor Systems</li>
<li>Customized Warehouse Storage Solutions</li>
</ul>
<h3>PEB Components</h3>
<ul>
<li>Structural Components</li>
<li>Purlins &amp; Girts</li>
<li>Bracing Components</li>
<li>Roofing &amp; Cladding Components</li>
<li>Related PEB Accessories</li>
</ul>

<h2>Why Choose Zahid Steel Limited?</h2>
<p>We focus on providing reliable materials and responsive service for project-based requirements.</p>
<h3>Quality Materials</h3>
<p>We focus on supplying materials that meet the required project specifications and applicable quality requirements.</p>
<h3>On-Time Delivery</h3>
<p>We coordinate order processing and transportation to support timely delivery according to project requirements.</p>
<h3>Competitive Pricing</h3>
<p>We offer project-focused pricing based on product type, specifications, quantity, and order requirements.</p>
<h3>Technical Support</h3>
<p>Our team can assist with product selection, specifications, quantities, and technical requirements where applicable.</p>
<h3>Bulk Order Capacity</h3>
<p>We support project and bulk material requirements for industrial, commercial, construction, and warehouse applications.</p>

<h2>Our Supply Process</h2>
<p>We follow a simple and organized process from inquiry to delivery.</p>
<p class="svc-flowline">Inquiry &rarr; Quotation &rarr; Order Confirmation &rarr; Production / Sourcing &rarr; Quality Check &rarr; Delivery</p>

<h2>Delivery &amp; Coverage</h2>
<p>We provide steel products and structural materials for projects across Bangladesh, subject to product availability, order quantity, project location, and transportation requirements.</p>

<h2>Quality &amp; Certification</h2>
<p>Quality documentation can be provided where applicable based on the product and project requirements.</p>
<ul>
<li>Material Test Reports</li>
<li>Mill Certificates</li>
<li>Product Specifications</li>
<li>Quality Inspection Reports</li>
<li>ISO Certifications</li>
<li>Applicable Standards &amp; Compliance Documents</li>
</ul>

<h2>Need Steel Materials for Your Project?</h2>
<p>Whether you are working on a factory, warehouse, industrial building, commercial project, PEB structure, or other construction project, Zahid Steel Limited can provide steel products and structural materials based on your requirements.</p>
HTML,
            ],
        ];
    }
}
