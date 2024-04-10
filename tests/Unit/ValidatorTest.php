<?php

use Core\Validator;



describe("Validator class should validate any type of data and return a boolean", function () {

  it("should return true if it's a valid string", function () {
    expect(Validator::string("Test"))->toBeTrue();
  });

  it("should return false if it isn't a valid string", function () {
    // empty string
    expect(Validator::string(""))->toBeFalse();

    // int
    expect(Validator::string((int) 1))->toBeFalse();

    // bool
    expect(Validator::string(true))->toBeFalse();
  });

});


