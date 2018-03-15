<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = ['Ceative Suite','Agile Development','Agile Methodologies','Agile Project Management','AJAX','AngularJS','APIs','AWS EC2','AWS S3','Axure','Backbone.js','BDD','Business Development','Chrome Extension Development','Client Relationships','Cocoa Touch','Concept Generation','Content Strategy','Copywriting','CSS','CSS3','D3.js','Data Analysis','Database Architecture','Data Visualization','Debugging','Design','Digital Strategy','Ember.js','Ethnographic Research','Express','Final Cut Pro','Finance','Firebase','Flinto','Foundation Framework','Git','Google Analytics','Graphic Design','HAML','Heroku','HTML','HTML5','HTML / CSS','HTML5 / CSS3','Illustration','Illustrator','Information Architecture','Invision','InDesign','Jade','Jasmine','Java','JavaScript','Jbuilder','jQuery','LESS','Market Analysis','Marketing','Mobile Design','Mobile Responsive Design','MongoDB','Motion 5','Motion Graphic Design','Node.js','Objective-C','Object-Oriented Programming','Omnigraffle','Phaser.js','Photography','Photoshop','PHP','PostgreSQL','PPC','Problem Solving','Product Management','Project Management','Prototyping','Python','Redis','Relationship Management','Research','RSpec','RSpec / MiniTest','Ruby','Ruby on Rails','Sales','Salesforce','SASS','Scrum','SEO','Sinatra','Sketching','SMO','SQL','Startup Entrepreneurship','Strategy','Swift','TDD','TDD / BDD','Teaching','Team Management','Testing','Three.js','Troubleshooting','Underscore.js','User Interface Design','User Research','UX Design','Video Games','Videography','Visual Design','Web / Print Design','Wireframing','Wordpress','Writing','Xcode'];

        for ($i=0; $i<count($skills); $i++){
            $skill = new Skill();
            $skill->name = $skills[$i];

            $skill->save();
        }
    }
}
