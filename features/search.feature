Feature: Search
  In order to add a new bird
  As a web user
  I need to be able to log in and add a new bird

  Scenario: Adding a new bird i just saw
    Given I am on "/#secondPage"
    When I fill in the search box with "fou de bassan"