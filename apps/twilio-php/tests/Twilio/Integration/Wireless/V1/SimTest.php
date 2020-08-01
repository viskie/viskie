<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Wireless\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class SimTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->wireless->v1->sims("DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://wireless.twilio.com/v1/Sims/DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "unique_name": "unique_name",
                "commands_callback_method": "http_method",
                "commands_callback_url": "http://www.example.com",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "friendly_name": "friendly_name",
                "sms_fallback_method": "http_method",
                "sms_fallback_url": "http://www.example.com",
                "sms_method": "http_method",
                "sms_url": "http://www.example.com",
                "voice_fallback_method": "http_method",
                "voice_fallback_url": "http://www.example.com",
                "voice_method": "http_method",
                "voice_url": "http://www.example.com",
                "links": {
                    "data_sessions": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/DataSessions",
                    "rate_plan": "https://wireless.twilio.com/v1/RatePlans/WPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                    "usage_records": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/UsageRecords"
                },
                "rate_plan_sid": "WPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "iccid": "iccid",
                "e_id": "e_id",
                "status": "new",
                "reset_status": null,
                "url": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "ip_address": "192.168.1.1"
            }
            '
        ));

        $actual = $this->twilio->wireless->v1->sims("DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->wireless->v1->sims->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://wireless.twilio.com/v1/Sims'
        ));
    }

    public function testReadEmptyResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sims": [],
                "meta": {
                    "first_page_url": "https://wireless.twilio.com/v1/Sims?Status=new&Iccid=iccid&RatePlan=rate_plan&PageSize=50&Page=0",
                    "key": "sims",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://wireless.twilio.com/v1/Sims?Status=new&Iccid=iccid&RatePlan=rate_plan&PageSize=50&Page=0"
                }
            }
            '
        ));

        $actual = $this->twilio->wireless->v1->sims->read();

        $this->assertNotNull($actual);
    }

    public function testReadFullResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sims": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "unique_name": "unique_name",
                        "commands_callback_method": "http_method",
                        "commands_callback_url": "http://www.example.com",
                        "date_created": "2015-07-30T20:00:00Z",
                        "date_updated": "2015-07-30T20:00:00Z",
                        "friendly_name": "friendly_name",
                        "links": {
                            "data_sessions": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/DataSessions",
                            "rate_plan": "https://wireless.twilio.com/v1/RatePlans/WPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "usage_records": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/UsageRecords"
                        },
                        "rate_plan_sid": "WPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "sid": "DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "iccid": "iccid",
                        "e_id": "e_id",
                        "status": "new",
                        "reset_status": "resetting",
                        "sms_fallback_method": "http_method",
                        "sms_fallback_url": "http://www.example.com",
                        "sms_method": "http_method",
                        "sms_url": "http://www.example.com",
                        "voice_fallback_method": "http_method",
                        "voice_fallback_url": "http://www.example.com",
                        "voice_method": "http_method",
                        "voice_url": "http://www.example.com",
                        "url": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "ip_address": "192.168.1.30"
                    }
                ],
                "meta": {
                    "first_page_url": "https://wireless.twilio.com/v1/Sims?Status=new&Iccid=iccid&RatePlan=rate_plan&PageSize=50&Page=0",
                    "key": "sims",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://wireless.twilio.com/v1/Sims?Status=new&Iccid=iccid&RatePlan=rate_plan&PageSize=50&Page=0"
                }
            }
            '
        ));

        $actual = $this->twilio->wireless->v1->sims->read();

        $this->assertGreaterThan(0, \count($actual));
    }

    public function testUpdateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->wireless->v1->sims("DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://wireless.twilio.com/v1/Sims/DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testUpdateResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "unique_name": "unique_name",
                "commands_callback_method": "http_method",
                "commands_callback_url": "http://www.example.com",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "friendly_name": "friendly_name",
                "links": {
                    "data_sessions": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/DataSessions",
                    "rate_plan": "https://wireless.twilio.com/v1/RatePlans/WPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                    "usage_records": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/UsageRecords"
                },
                "rate_plan_sid": "WPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "iccid": "iccid",
                "e_id": "e_id",
                "status": "new",
                "reset_status": null,
                "sms_fallback_method": "http_method",
                "sms_fallback_url": "http://www.example.com",
                "sms_method": "http_method",
                "sms_url": "http://www.example.com",
                "voice_fallback_method": "http_method",
                "voice_fallback_url": "http://www.example.com",
                "voice_method": "http_method",
                "voice_url": "http://www.example.com",
                "url": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "ip_address": "192.168.1.30"
            }
            '
        ));

        $actual = $this->twilio->wireless->v1->sims("DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update();

        $this->assertNotNull($actual);
    }

    public function testUpdateMoveToSubaccountResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb",
                "unique_name": "unique_name",
                "commands_callback_method": "http_method",
                "commands_callback_url": "http://www.example.com",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "friendly_name": "friendly_name",
                "links": {
                    "data_sessions": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/DataSessions",
                    "rate_plan": "https://wireless.twilio.com/v1/RatePlans/WPbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb",
                    "usage_records": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/UsageRecords"
                },
                "rate_plan_sid": "WPbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb",
                "sid": "DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "iccid": "iccid",
                "e_id": "e_id",
                "status": "new",
                "reset_status": null,
                "sms_fallback_method": "http_method",
                "sms_fallback_url": "http://www.example.com",
                "sms_method": "http_method",
                "sms_url": "http://www.example.com",
                "voice_fallback_method": "http_method",
                "voice_fallback_url": "http://www.example.com",
                "voice_method": "http_method",
                "voice_url": "http://www.example.com",
                "url": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "ip_address": "192.168.1.30"
            }
            '
        ));

        $actual = $this->twilio->wireless->v1->sims("DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update();

        $this->assertNotNull($actual);
    }

    public function testUpdateResetConnectivityResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "unique_name": "unique_name",
                "commands_callback_method": "http_method",
                "commands_callback_url": "http://www.example.com",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "friendly_name": "friendly_name",
                "links": {
                    "data_sessions": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/DataSessions",
                    "rate_plan": "https://wireless.twilio.com/v1/RatePlans/WPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                    "usage_records": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/UsageRecords"
                },
                "rate_plan_sid": "WPaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "iccid": "iccid",
                "e_id": "e_id",
                "status": "active",
                "reset_status": "resetting",
                "sms_fallback_method": "http_method",
                "sms_fallback_url": "http://www.example.com",
                "sms_method": "http_method",
                "sms_url": "http://www.example.com",
                "voice_fallback_method": "http_method",
                "voice_fallback_url": "http://www.example.com",
                "voice_method": "http_method",
                "voice_url": "http://www.example.com",
                "url": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "ip_address": "192.168.1.30"
            }
            '
        ));

        $actual = $this->twilio->wireless->v1->sims("DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update();

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->wireless->v1->sims("DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://wireless.twilio.com/v1/Sims/DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testDeleteResponse(): void {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->wireless->v1->sims("DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();

        $this->assertTrue($actual);
    }
}