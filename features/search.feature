Feature: Search
  In order to add a new bird
  As a web user
  I need to be able to log in and add a new bird

  @javascript
  Scenario: Adding a new bird i just saw
    Given I am on "/nouvelle_observation"
    When I want to add a new bird