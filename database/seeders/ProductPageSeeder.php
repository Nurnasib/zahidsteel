<?php

namespace Database\Seeders;

use App\Models\ServicePage;
use Illuminate\Database\Seeder;

class ProductPageSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->pages() as $page) {
            // firstOrCreate: seed defaults only when the page is missing, so admin edits are never overwritten by re-seeding.
            ServicePage::firstOrCreate(
                ['key' => $page['key']],
                [
                    'type'             => 'product',
                    'title'            => $page['title'],
                    'subtitle'         => $page['subtitle'],
                    'meta_title'       => $page['meta_title'],
                    'meta_description' => $page['meta_description'],
                    'blocks'           => json_encode($page['blocks']),
                    'body'             => $page['body'],
                ]
            );
        }
    }

    private function pages(): array
    {
        return [
            [
                'key'              => 'steel-structure',
                'title'            => 'Steel Structure Solutions in Bangladesh',
                'subtitle'         => 'Engineered for Strength. Built for Performance.',
                'meta_title'       => 'Steel Structure Company in Bangladesh | Zahid Steel',
                'meta_description' => 'Looking for a steel structure company in Bangladesh? Zahid Steel provides steel building design, fabrication, and erection solutions for factories and warehouses.',
                'blocks'           => [
                    [
                        'image' => null,
                        'text'  => '<p>Zahid Steel Ltd. provides steel structure solutions for industrial, commercial, and warehouse projects. From structural design and fabrication to on-site erection, we help businesses develop functional steel buildings tailored to their project requirements.</p>',
                    ],
                    [
                        'image' => null,
                        'text'  => '<h3>About Our Steel Structure Solutions</h3><p>Zahid Steel Ltd. offers steel structure solutions designed around the functional, architectural, and engineering requirements of each project. Our services cover structural planning, fabrication, transportation, and erection, subject to project scope.</p><p>We work with clients seeking steel buildings for industrial operations, manufacturing facilities, warehouses, and commercial applications. Our focus is on practical design, fabrication quality, structural safety, and efficient project coordination.</p>',
                    ],
                ],
                'body'             => <<<'HTML'
<h2>Our Steel Structure Services</h2>
<h3>Structural Design &amp; Engineering</h3>
<p>Project-specific structural planning and engineering based on building dimensions, intended use, loading requirements, and applicable building codes.</p>
<h3>Steel Fabrication</h3>
<p>Fabrication of structural steel members and components according to approved drawings, specifications, and project requirements.</p>
<h3>Steel Structure Erection</h3>
<p>On-site assembly and installation of fabricated steel components, with appropriate attention to construction procedures and safety.</p>
<h3>Pre-Engineered Buildings (PEB)</h3>
<p>Steel building solutions for factories, warehouses, industrial sheds, and other suitable large-span applications.</p>

<h2>Applications of Steel Structures</h2>
<ul>
<li>Industrial factories and manufacturing plants</li>
<li>Warehouse and logistics facilities</li>
<li>Garments and textile factories</li>
<li>Industrial sheds and workshops</li>
<li>Commercial and institutional buildings</li>
<li>Aircraft hangars and other large-span facilities</li>
</ul>
<p>The suitability of each structural system depends on the building's purpose, design requirements, site conditions, and applicable regulations.</p>

<h2>Why Choose Zahid Steel Ltd.?</h2>
<ul>
<li><strong>Project-Specific Engineering:</strong> Solutions developed around the project's requirements.</li>
<li><strong>Integrated Services:</strong> Design, fabrication, and erection coordination according to the agreed scope.</li>
<li><strong>Practical Building Solutions:</strong> Structural layouts tailored to operational needs.</li>
<li><strong>Quality-Focused Fabrication:</strong> Components produced according to approved specifications.</li>
<li><strong>Professional Project Coordination:</strong> Support throughout the agreed stages of the project.</li>
</ul>

<h2>Our Steel Structure Project Process</h2>
<ol>
<li><strong>Requirement Analysis</strong> — Understand the site, building use, dimensions, and project objectives.</li>
<li><strong>Design &amp; Engineering</strong> — Develop the structural design and drawings according to project requirements.</li>
<li><strong>Fabrication</strong> — Fabricate the steel components in accordance with approved drawings and specifications.</li>
<li><strong>Transportation &amp; Erection</strong> — Coordinate delivery and on-site installation according to the project scope.</li>
<li><strong>Inspection &amp; Handover</strong> — Complete the agreed inspections and project handover procedures.</li>
</ol>

<h2>Frequently Asked Questions</h2>
<h3>What is a steel structure building?</h3>
<p>A steel structure building is a building supported primarily by engineered steel members such as columns, beams, rafters, and bracing.</p>
<h3>What is a Pre-Engineered Building (PEB)?</h3>
<p>A PEB is a building system in which major structural components are engineered and fabricated in advance and then assembled at the project site.</p>
<h3>Which projects are suitable for steel structures?</h3>
<p>Steel structures are commonly used for factories, warehouses, industrial sheds, workshops, and suitable commercial buildings.</p>
<h3>Does Zahid Steel Ltd. provide design, fabrication, and erection services?</h3>
<p>Confirm the exact services available for a specific project with Zahid Steel Ltd.'s engineering and sales team.</p>

<h2>Planning a Steel Structure Project?</h2>
<p>Let Zahid Steel Ltd. help you explore a suitable steel building solution for your factory, warehouse, or industrial facility.</p>
HTML,
            ],
            [
                'key'              => 'road-safety',
                'title'            => 'Road Safety Products in Bangladesh',
                'subtitle'         => 'Reliable Steel Solutions for Safer Roads',
                'meta_title'       => 'Highway Guardrail & Road Barrier | Zahid Steel LTD',
                'meta_description' => 'Explore road safety products by Zahid Steel Ltd. Discover steel highway guardrails and road barriers for highways, bridges, and industrial roads.',
                'blocks'           => [
                    [
                        'image' => null,
                        'text'  => '<p>Zahid Steel Ltd. provides steel road safety solutions for highways, bridges, expressways, and industrial roads. Our road safety product range focuses on durable steel guardrails and road barriers designed to support roadside protection and traffic safety applications.</p><p>We understand the importance of reliable roadside safety systems in modern transportation infrastructure. Our solutions can be selected according to project specifications, road conditions, and applicable safety standards.</p><p>Contact Zahid Steel Ltd. to discuss your road safety project requirements.</p>',
                    ],
                    [
                        'image' => null,
                        'text'  => '<h3>Highway Guardrails</h3><p>Highway guardrails are roadside safety systems designed to help contain or redirect vehicles in appropriate road conditions. They are commonly used along highways, bridges, expressways, and road sections where roadside hazards require protection.</p><p>Zahid Steel Ltd. offers steel guardrail solutions for infrastructure and transportation projects, subject to project specifications and applicable standards.</p><ul><li>Highways and expressways</li><li>Roadside protection zones</li><li>Bridge approaches</li><li>Industrial roads</li><li>Transportation infrastructure projects</li></ul>',
                    ],
                ],
                'body'             => <<<'HTML'
<h2>Our Road Safety Products</h2>
<h3>W-Beam Guardrails</h3>
<p>W-Beam guardrails feature a distinctive corrugated steel profile and are widely used in roadside barrier systems. When properly designed, selected, and installed as part of a compliant system, they can help manage vehicle impacts and reduce the risk of vehicles entering hazardous roadside areas.</p>
<p>Our W-Beam guardrail solutions can be specified according to project requirements, including dimensions, steel specifications, coating requirements, and installation details.</p>
<h3>Steel Road Barriers</h3>
<p>Steel road barriers are used in suitable traffic management and roadside protection applications. Depending on the system design, they can help separate traffic areas, define road boundaries, and provide physical protection in selected locations.</p>
<p>We support road barrier requirements for highway, bridge, commercial, and industrial infrastructure projects.</p>
<h3>Highway and Bridge Safety Barriers</h3>
<p>Roadside and bridge safety barriers must be selected according to the specific risks, geometry, traffic conditions, and applicable safety requirements of each project.</p>
<p>Zahid Steel Ltd. can discuss suitable steel barrier solutions for highway projects, bridge approaches, elevated roads, and other infrastructure applications.</p>
<h3>Guardrail Accessories and Components</h3>
<p>A complete guardrail system may include posts, spacers, bolts, end terminals, and other compatible components. The required components depend on the selected barrier system and its approved design.</p>
<p>Component selection and installation should follow the relevant project specifications and manufacturer requirements.</p>

<h2>Why Choose Zahid Steel Ltd.?</h2>
<ul>
<li><strong>Steel-Based Solutions:</strong> Road safety products designed around project requirements.</li>
<li><strong>Project-Specific Specifications:</strong> Options based on required dimensions, materials, and finishes.</li>
<li><strong>Infrastructure Applications:</strong> Solutions for highways, bridges, and industrial roads.</li>
<li><strong>Quality-Focused Manufacturing:</strong> Production according to agreed technical specifications.</li>
<li><strong>Project Support:</strong> Assistance with product selection and coordination according to the agreed scope.</li>
</ul>

<h2>Applications of Road Safety Products</h2>
<ul>
<li>National highways and expressways</li>
<li>Bridges and bridge approaches</li>
<li>Industrial and factory roads</li>
<li>Commercial infrastructure</li>
<li>Roadside hazard protection</li>
<li>Selected traffic separation applications</li>
</ul>
<p>The appropriate product and installation arrangement should be determined by qualified professionals in accordance with applicable road safety standards.</p>

<h2>Our Road Safety Solution Process</h2>
<ol>
<li><strong>Project Requirements</strong> — We review your project requirements, location, intended application, and technical specifications.</li>
<li><strong>Product Selection</strong> — We discuss suitable guardrail or road barrier options based on the project scope and applicable standards.</li>
<li><strong>Specification and Quotation</strong> — Product specifications, quantities, finishes, and commercial requirements are reviewed for quotation.</li>
<li><strong>Manufacturing and Delivery</strong> — Manufacturing and delivery are coordinated according to the confirmed order and agreed project schedule.</li>
<li><strong>Installation Coordination</strong> — Installation requirements and responsibilities are coordinated according to the agreed scope of work.</li>
</ol>

<h2>Frequently Asked Questions</h2>
<h3>What are road safety products?</h3>
<p>Road safety products include guardrails, road barriers, terminals, and related components used in suitable roadside protection and traffic management applications.</p>
<h3>What is a highway guardrail?</h3>
<p>A highway guardrail is a roadside barrier system designed to help contain or redirect vehicles when installed in appropriate conditions as part of a compliant safety system.</p>
<h3>What is a W-Beam guardrail?</h3>
<p>A W-Beam guardrail is a steel barrier featuring a corrugated W-shaped profile. Its performance depends on the complete system design, materials, installation, and applicable testing or approval requirements.</p>
<h3>Where are steel road barriers used?</h3>
<p>Depending on their design, steel road barriers may be used on highways, bridges, industrial roads, and selected traffic management sites.</p>
<h3>How can I request a quotation from Zahid Steel Ltd.?</h3>
<p>Contact Zahid Steel Ltd. with your project location, required product type, approximate quantity, dimensions, and technical specifications to discuss pricing and availability.</p>

<h2>Looking for Highway Guardrails or Steel Road Barriers in Bangladesh?</h2>
<p>Zahid Steel Ltd. is ready to discuss your road safety product requirements for highway, bridge, and industrial infrastructure projects.</p>
HTML,
            ],
            [
                'key'              => 'custom-fabrication',
                'title'            => 'Custom Steel Fabrication Solutions in Bangladesh',
                'subtitle'         => 'Built to Your Specifications. Made for Your Project.',
                'meta_title'       => 'Custom Metal Fabrication Services | Zahid Steel',
                'meta_description' => 'Need custom steel fabrication in Bangladesh? Zahid Steel Ltd. offers project-based metal fabrication solutions for industrial, commercial, and infrastructure applications.',
                'blocks'           => [
                    [
                        'image' => null,
                        'text'  => '<p>Zahid Steel Ltd. provides custom steel fabrication solutions for industrial, commercial, and infrastructure projects. From made-to-order steel components to project-specific fabricated assemblies, we work from customer requirements, approved drawings, and agreed technical specifications.</p><p>Whether your project requires structural steel components, support frames, platforms, brackets, or other fabricated steel items, our team can discuss the scope and help identify a suitable fabrication approach.</p>',
                    ],
                    [
                        'image' => null,
                        'text'  => '<h3>About Our Custom Fabrication Services</h3><p>Every project has different dimensions, operating conditions, and installation requirements. Custom fabrication helps turn those requirements into steel components designed for a particular application.</p><p>Zahid Steel Ltd. works with clients to review drawings, material requirements, dimensions, finishing needs, quantities, and delivery expectations before confirming a fabrication scope. Our aim is to provide practical, specification-led solutions that fit the intended use of each project.</p>',
                    ],
                ],
                'body'             => <<<'HTML'
<h2>Our Custom Fabrication Capabilities</h2>
<h3>Structural Steel Components</h3>
<p>Custom-fabricated steel members and assemblies for building and industrial projects, produced according to approved drawings and specifications.</p>
<h3>Steel Frames and Supports</h3>
<p>Made-to-order frames, brackets, support members, and mounting structures for suitable industrial and commercial applications.</p>
<h3>Platforms, Walkways and Access Components</h3>
<p>Fabricated platforms, walkways, and related steel components based on project dimensions, access needs, loading criteria, and safety requirements.</p>
<h3>Industrial Steel Components</h3>
<p>Custom steel parts and assemblies for factories, warehouses, workshops, and equipment-support applications.</p>
<h3>Project-Specific Fabrication</h3>
<p>Fabrication solutions reviewed against customer drawings, samples, dimensions, material grades, finishes, and quantity requirements.</p>

<h2>Materials and Finishing Options</h2>
<p>Material and finishing choices depend on the intended application, environmental exposure, design requirements, and project budget. Depending on availability and confirmed scope, fabrication may involve:</p>
<ul>
<li>Mild steel and other specified steel grades</li>
<li>Cutting, drilling, bending, and forming where applicable</li>
<li>Welding and assembly according to approved procedures</li>
<li>Surface preparation and painting</li>
<li>Galvanized or other specified protective finishes, where available</li>
</ul>
<p>Final material grades, fabrication methods, tolerances, coatings, and inspection requirements should be confirmed in writing before production.</p>

<h2>Why Choose Zahid Steel Ltd. for Custom Fabrication?</h2>
<ul>
<li><strong>Made-to-Order Approach:</strong> Solutions planned around your dimensions, drawings, and project requirements.</li>
<li><strong>Specification-Based Production:</strong> Work aligned with agreed materials, finishes, and technical details.</li>
<li><strong>Industrial Project Focus:</strong> Fabrication options for suitable industrial, commercial, and infrastructure applications.</li>
<li><strong>Coordinated Workflow:</strong> Clear review of drawings, quantities, and delivery expectations before production.</li>
<li><strong>Project Communication:</strong> Coordination with customers to clarify requirements and manage the agreed scope.</li>
</ul>

<h2>Our Custom Fabrication Process</h2>
<ol>
<li><strong>Requirement Review</strong> — Share your intended application, dimensions, drawings, photos, or reference sample.</li>
<li><strong>Technical Review</strong> — Review material grades, tolerances, connections, finishing, quantities, and other specifications.</li>
<li><strong>Quotation and Approval</strong> — Confirm the scope, commercial terms, delivery schedule, and approved drawings.</li>
<li><strong>Fabrication and Quality Checks</strong> — Carry out the agreed fabrication work and checks in line with the confirmed specifications.</li>
<li><strong>Delivery or Handover</strong> — Coordinate delivery and any agreed installation or handover requirements.</li>
</ol>

<h2>Industries and Applications</h2>
<ul>
<li>Steel building and pre-engineered building projects</li>
<li>Factories and manufacturing facilities</li>
<li>Warehouses and logistics facilities</li>
<li>Commercial and industrial facilities</li>
<li>Infrastructure and construction projects</li>
<li>Equipment supports, frames, and custom steel assemblies</li>
</ul>

<h2>Frequently Asked Questions</h2>
<h3>What is custom steel fabrication?</h3>
<p>Custom steel fabrication is the process of making steel components or assemblies to meet a specific design, dimension, or application requirement.</p>
<h3>Can I request fabrication based on my drawings?</h3>
<p>You can submit drawings, dimensions, photographs, or a reference sample for review. The final scope depends on technical feasibility and confirmation by the Zahid Steel Ltd. team.</p>
<h3>What information is needed for a quotation?</h3>
<p>Provide the component description, drawings or dimensions, material grade, finish, quantity, delivery location, and target delivery date where known.</p>
<h3>Can fabricated components be painted or galvanized?</h3>
<p>Finishing options depend on the component, project specification, availability, and agreed scope. Confirm the required finish during quotation.</p>
<h3>Does Zahid Steel Ltd. provide installation?</h3>
<p>Installation or on-site work should be confirmed with the company based on the specific project and agreed scope.</p>

<h2>Have a Custom Steel Fabrication Requirement?</h2>
<p>Share your drawings, dimensions, material specifications, quantity, and intended application with Zahid Steel Ltd. Our team can review your requirements and discuss a suitable fabrication solution and quotation.</p>
HTML,
            ],
        ];
    }
}
