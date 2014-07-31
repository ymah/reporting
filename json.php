<?php
/*

les requetes sont effectuées a partir de requete Json recupérée avec Kibana ( sur les conseils d'elasticsearch )
une fois recupérée on l'enregistre dans une variable.
on passe ensuite dans le fichier client.php...
*/

session_start();



//all events
    $allJson = '{
  "facets": {
    "17": {
      "date_histogram": {
        "field": "@timestamp",
        "interval": "10m"
      },
      "global": true,
      "facet_filter": {
        "fquery": {
          "query": {
            "filtered": {
              "query": {
                "query_string": {
                  "query": "program:afm AND client:'.$client.'"
                }
              },
              "filter": {
                "bool": {
                  "must": [
                    {
                      "range": {
                        "@timestamp": {
                          "from":"'.$dep.'T00:00:00",
                          "to":"'.$fin.'T00:00:00"
                        }
                      }
                    }
                  ]
                }
              }
            }
          }
        }
      }
    }
  },
  "size": 0
}';
    
    
/*------------------------------*/

//Top 10 IPs :
    $ipJson = '{
  "facets": {
    "terms": {
      "terms": {
        "field": "geoip.ip",
        "size": 10,
        "order": "count",
        "exclude": []
      },
      "facet_filter": {
        "fquery": {
          "query": {
            "filtered": {
              "query": {
                "bool": {
                  "should": [
                    {
                      "query_string": {
                        "query": "program:afm AND client:'.$client.'"
                      }
                    }
                  ]
                }
              },
              "filter": {
                "bool": {
                  "must": [
                    {
                      "range": {
                        "@timestamp": {
                          "from": "'.$dep.'T00:00:00",
                          "to": "'.$fin.'T00:00:00"
                        }
                      }
                    }
                  ]
                }
              }
            }
          }
        }
      }
    }
  },
  "size": 0
}';








//top 10 afm Explenation
    $afmExplJson =  '{
  "facets": {
    "terms": {
      "terms": {
        "field": "afm.explanation",
        "size": 10,
        "order": "count",
        "exclude": []
      },
      "facet_filter": {
        "fquery": {
          "query": {
            "filtered": {
              "query": {
                "bool": {
                  "should": [
                    {
                      "query_string": {
                        "query": "program:afm AND client:'.$client.'"
                      }
                    }
                  ]
                }
              },
              "filter": {
                "bool": {
                  "must": [
                    {
                      "range": {
                        "@timestamp": {
                          "from":"'.$dep.'T00:00:00",
                          "to": "'.$fin.'T00:00:00"
                        }
                      }
                    }
                  ]
                }
              }
            }
          }
        }
      }
    }
  },
  "size": 0
}';



//top 10 URL Path
    $urlPathJson = '{
  "facets": {
    "terms": {
      "terms": {
        "field": "url.path",
        "size": 10,
        "order": "count",
        "exclude": []
      },
      "facet_filter": {
        "fquery": {
          "query": {
            "filtered": {
              "query": {
                "bool": {
                  "should": [
                    {
                      "query_string": {
                        "query": "program:afm AND client:'.$client.'"
                      }
                    }
                  ]
                }
              },
              "filter": {
                "bool": {
                  "must": [
                    {
                      "range": {
                        "@timestamp": {
                          "from":"'.$dep.'T00:00:00",
                          "to":"'.$fin.'T00:00:00"
                        }
                      }
                    }
                  ]
                }
              }
            }
          }
        }
      }
    }
  },
  "size": 0
}';

//TOP 10 HOSTS : 

$hostJson = '{
  "facets": {
    "terms": {
      "terms": {
        "field": "http.host",
        "size": 10,
        "order": "count",
        "exclude": []
      },
      "facet_filter": {
        "fquery": {
          "query": {
            "filtered": {
              "query": {
                "bool": {
                  "should": [
                    {
                      "query_string": {
                        "query": "client:'.$client.' AND program:afm"
                      }
                    }
                  ]
                }
              },
              "filter": {
                "bool": {
                  "must": [
                    {
                      "range": {
                        "@timestamp": {
                          "from":"'.$dep.'T00:00:00",
                          "to":"'.$fin.'T00:00:00"
                      }
                      }
                    }
                  ]
                }
              }
            }
          }
        }
      }
    }
  },
  "size": 0
}';