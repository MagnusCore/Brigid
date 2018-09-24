# Brigid
A component management system written in PHP for ease of development. The idea behind Brigid is to get content management system behavior without the typical bloat and insecurity of traditional CMSes.

## Component Management Systems vs Content Management Systems - What's the Difference?
Component management systems are about managing components. The building blocks that goes into building a website. Yes, services such as Wordpress and Drupal have this functionality but they are defined as a Content Management System. The roles here are a bit different. With component management, you're dealing with defined sections of your site, the creating, reading, updating and deletion of those sections and anything pertaining those.

Content management systems will go further than this by including things such as user accounts, content migrations, authentication, etc. This is not the goal of Brigid. Brigid is intended to be added onto your website, preferably a MagnusCore site, to enhance the functionality of pages built upon it. The reasoning for this is to offer the ease of use with content and page stylings that Wordpress and Drupal affords you but without the arbitrary restrictions they enforce such as using their authentication system, their models for content and so on. With a cleaner separation of responsibilities, you avoid many of the issues brought upon by a large framework and allow for easier swapping of parts.

## What's In The Box?
- Creating, reading, updating and deleting of blocks when provided with a data store
- Bare-bones section-based HTML markup
-- Keep in mind, you're welcome to provide your own markup. Brigid provides the objects in an array so you can apply your own markup based on those for your templating engine
- Editor's panel allowing you to easily modify styles and attributes or drag and drop sections as needed
- Editor's mode, while the panel is open, all sections on the page becomes directly modifiable with the help of Medium's editor. Making changes and then committing them will make the necessary updates in the database.
