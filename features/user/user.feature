Feature: User
  In order to gain access to the add bird area
  As an anonymous user
  I need to be able to register and go to the add bird area to fill the form

  @fixtures
  Scenario: Register for the first time
    Given I am on the homepage
    Then I follow "Inscription"
    Then I should be on "/inscription/"
    And I fill in "fos_user_registration_form[username]" with "quentin"
    And I fill in "fos_user_registration_form[email]" with "quentin@gmail.com"
    And I fill in "fos_user_registration_form[plainPassword][first]" with "qwerty"
    And I fill in "fos_user_registration_form[plainPassword][second]" with "qwerty"
    And I press "Je m'inscris"
    Then I should be on "/inscription/confirmation"
    And I follow "Accueil"
    Then I should be on the homepage

  @javascript
  Scenario: Add a new bird
    Given I am on the homepage
    And I click the link "#logoNavbar"
    Then I should be on "/connexion"
    And I fill in "Nom d'utilisateur" with "quentin"
    And I fill in "Mot de passe" with "qwerty"
    And I press "Connexion"
    When I click the link ".navbar-toggle"
    Then I click the link ""
    Then I should be on "/nouvelle_observation"
    Then I click on "share location"